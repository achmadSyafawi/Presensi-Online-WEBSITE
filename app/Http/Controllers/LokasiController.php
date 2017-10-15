<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// load model
use App\Lokasi;

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
        
        //dd($category);

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
