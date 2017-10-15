<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

// load model
use App\Absensi;
use App\Lokasi;
use App\HariLibur;
use App\Pegawai;
use PDF;

class AbsensiController extends Controller
{
    public function index()
    {
        //
        $absensi = DB::select('select absensi.id, tgl, absensi.nidn as nidn,pegawai.name as name, 
        max(case when(type= 1) then waktu else null end) as jam_masuk, 
        max(case when(type= 1) then foto else null end) as foto_masuk,
        max(case when(type= 2) then waktu else null end) as jam_keluar, 
        max(case when(type= 2) then foto else null end) as foto_keluar, 
        id_lokasi,
        lokasi.name as lokasi 
        FROM absensi,lokasi,pegawai 
        WHERE absensi.id_lokasi = lokasi.id 
        AND absensi.nidn = pegawai.nidn AND absensi.status = "1"
        GROUP BY nidn, tgl');
        return view('admin.absensi.index',compact('absensi'));
    }

    public function absensiBaru()
    {
        $absensi = Absensi::where('status', 0)->get();
        return view('admin.absensiBaru.index',compact('absensi'));
    }

    public function absensiDitolak()
    {
        $absensi = Absensi::where('status', 2)->get();
        return view('admin.absensiDitolak.index',compact('absensi'));
    }
    
    public function create()
    {
        return view('admin.absensi.create');
    }
    
    public function store(Request $request)
    {
        $absensi = $request->all();
        
        //dd($category);

        Absensi::create($absensi);

        return redirect('admin/absensi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $absensi = Absensi::find($id);
        return view('admin.absensi.edit',compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $absensiUpdate = $request->all();
        $absensi = Absensi::find($id);
        
        $absensi->update($absensiUpdate);
        return redirect('admin/absensi');
    }

    public function updateAccept($id)
    {
        $absensi = Absensi::find($id);
        $absensi->status = 1;
        $absensi->save();
        return redirect('admin/absensiBaru');
    }

    public function updateDecline($id)
    {
        $absensi = Absensi::find($id);
        $absensi->status = 2;
        $absensi->save();
        return redirect('admin/absensiBaru');
    }

    public function graf($nidn)
    {
        $id = $nidn;
        $nidn = DB::select("SELECT nidn, month(tgl) as tgl FROM absensi WHERE id = {$id}");
        $hari_libur = DB::select("SELECT * from hari_libur WHERE month(date) = {$nidn[0]->tgl}");
        $hari_libur = count($hari_libur);

        $start_date = date('Y').'-'.$nidn[0]->tgl.'-1';
        $end_date = date("Y-m-t", strtotime($start_date));

        $dt = Carbon::createFromFormat('Y-m-d', $start_date);
        $dt2 = Carbon::createFromFormat('Y-m-d', $end_date);

        $dayOfWeekend = $dt->diffInDaysFiltered(function(Carbon $date) {
            return $date->isWeekend();
        }, $dt2);
        
        $data = DB::select("SELECT absensi.nidn as nidn,
        pegawai.name as name, 
        tgl as bulan, 
        COUNT(tgl) as masuk,
        (Day(LAST_Day(tgl))- COUNT(tgl)-{$dayOfWeekend}-{$hari_libur}) as tidak_masuk, 
        DAY(LAST_DAY(tgl)) as days 
        FROM absensi, pegawai 
        where absensi.nidn = {$nidn[0]->nidn} AND type = '1' 
        AND absensi.nidn = pegawai.nidn AND month(tgl) = {$nidn[0]->tgl}
        GROUP BY month(tgl)");
        $dataArray = [];
        foreach($data as $row){
            $dataArray[$row->nidn] = array(
                'name' => $row->nidn,
                'data' => []
            );
            $tgl = date_create($row->bulan);
            $bulan = date_format($tgl,"M Y");
            array_push($dataArray[$row->nidn]['data'], ["masuk", $row->masuk]);   
        }
        // dd(json_encode($dataArray));
        return view('admin.absensi.viewGraf', compact('data','bulan','id','hari_libur', 'dayOfWeekend'));
    }

    public function laporan($id)
    {
        $nidn = DB::select("SELECT nidn, month(tgl) as bulan, year(tgl) as tahun, tgl FROM absensi WHERE id = {$id}");
        // $pegawai = DB::select("SELECT * FROM pegawai WHERE nidn = {$nidn[0]->nidn}");
        
        $data = DB::select("SELECT absensi.id, tgl, absensi.nidn as nidn,pegawai.name as name, 
        max(case when(type= 1) then waktu else null end) as jam_masuk, 
        max(case when(type= 2) then waktu else null end) as jam_keluar 
        FROM absensi,lokasi,pegawai 
        WHERE absensi.id_lokasi = lokasi.id 
        AND absensi.nidn = {$nidn[0]->nidn} AND absensi.status = '1' AND month(tgl) = {$nidn[0]->bulan}
        GROUP BY nidn, tgl");

        $hadir = DB::select("SELECT absensi.nidn as nidn,
        pegawai.name as name, 
        tgl as bulan, 
        COUNT(tgl) as masuk,
        (Day(LAST_Day(tgl))- COUNT(tgl)) as tidak_masuk, 
        DAY(LAST_DAY(tgl)) as days
        FROM absensi, pegawai
        where absensi.nidn = {$nidn[0]->nidn} 
        AND type = '1' 
        AND absensi.nidn = pegawai.nidn 
        AND month(tgl) = {$nidn[0]->bulan}
        GROUP BY month(tgl)");

        $libur = HariLibur::all();

        $namaBulan = ['JANUARI', 'FEBRUARI', 
                    'MARET', 'APRIL',
                    'MEI', 'JUNI', 
                    'JULI', 'AGUSTUS', 
                    'SEPTEMBER', 'OKTOBER', 
                    'NOVEMBER', 'DESEMBER'];
        
        $pegawai = Absensi::find($id);
        
        $hariLibur = HariLibur::whereMonth('date', '=', $nidn[0]->bulan)->
                                whereYear('date', '=', $nidn[0]->tahun)->get();

        $pdf = PDF::loadView('admin.absensi.report',['nidn' => $nidn,
                                                     'pegawai' => $pegawai,
                                                     'data' => $data,
                                                     'hadir' => $hadir,
                                                     'libur' => $libur,
                                                     'hariLibur' => $hariLibur,
                                                     'namaBulan' => $namaBulan])->setPaper('a4','portrait');
        
        return $pdf->stream('report.pdf');
        //  return view('admin.absensi.report', compact('nidn','pegawai','data','hadir','libur', 'namaBulan', 'hariLibur'));

    }
    
    public function destroy($id)
    {
        Absensi::find($id)->delete();
        return redirect('admin/absensi');
    }
}
