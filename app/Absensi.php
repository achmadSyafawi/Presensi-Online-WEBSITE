<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi'; // table name
    protected $primaryKey = 'id'; // default id
    
    protected $fillable = ['tgl','masuk','keluar','ijin','foto','id_lokasi','nidn'];

    public function Place()
    {
        return $this->belongsTo('App\Lokasi', 'id_lokasi');
    }

    public function Pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'nidn');
    } 
}