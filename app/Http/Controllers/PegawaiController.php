<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// load model
use App\Pegawai;
use App\PegawaiKey;
use Validator;

class PegawaiController extends Controller
{
    public function index()
    {
        //
        $pegawai = Pegawai::all();

        return view('admin.pegawai.index',compact('pegawai'));
    }
    
    public function create()
    {
        return view('admin.pegawai.create');
    }
    
    public function store(Request $request)
    {
        $pegawai = $request->all();
        $rules = [
            'nidn' => 'unique:pegawai'
        ];
        
        $message = [
            'NIDN sudah ada'    
        ];

        $validator = Validator::make($pegawai, $rules, $message);

        if($validator->fails())
        {
            return redirect('admin/pegawai/create')->withErrors($validator)->withInput();
        }
        unset($pegawai["_token"]);

        Pegawai::firstOrCreate($pegawai);

        return redirect('admin/pegawai');
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
        $pegawai = Pegawai::find($id);
        return view('admin.pegawai.edit',compact('pegawai'));
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
        $pegawaiUpdate = $request->all();
        $pegawai = Pegawai::find($id);
        
        $pegawai->update($pegawaiUpdate);
        return redirect('admin/pegawai');
    }
    
    public function destroy($id)
    {
        Pegawai::find($id)->delete();
        return redirect('admin/pegawai');
    }
}
