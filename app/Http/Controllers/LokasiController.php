<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// load model
use App\Lokasi;
use Validator;

class LokasiController extends Controller
{
    public function index()
    {
        //
        $lokasi = Lokasi::all();

        return view('admin.lokasi.index',compact('lokasi'));
    }
    
    public function create()
    {
        return view('admin.lokasi.create');
    }
    
    public function store(Request $request)
    {
        $lokasi = $request->all();
        $rules = [
            'longi' => 'required|numeric',
            'lati' => 'required|numeric'
        ];
        
        $message = [
            'ada yang salah dalam pengisian kolom longitute',
            'ada yang salah dalam pengisian kolom latitude'    
        ];

        $validator = Validator::make($lokasi, $rules, $message);
        
        if($validator->fails())
        {
            return redirect('admin/lokasi/create')->withErrors($validator)->withInput();
        }
        Lokasi::create($lokasi);

        return redirect('admin/lokasi');
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
        $lokasi = Lokasi::find($id);
        return view('admin.lokasi.edit',compact('lokasi'));
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
        $lokasiUpdate = $request->all();
        $rules = [
            'longi' => 'required|numeric',
            'lati' => 'required|numeric'
        ];
        
        $message = [
            'ada yang salah dalam pengisian data longitude atau latitude'    
        ];

        $validator = Validator::make($lokasiUpdate, $rules, $message);
        
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $lokasi = Lokasi::find($id);
        
        $lokasi->update($lokasiUpdate);
        return redirect('admin/lokasi');
    }
    
    public function destroy($id)
    {
        Lokasi::find($id)->delete();
        return redirect('admin/lokasi');
    }
}
