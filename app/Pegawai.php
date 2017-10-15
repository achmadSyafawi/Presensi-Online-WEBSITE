<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai'; // table name
    protected $primaryKey = 'nidn'; // default id
    
    protected $fillable = ['nidn','name','pangkat','jabatan','program_studi','password'];

    public function Absensi()
    {
        return $this->hasMany('App\Absensi', 'nidn');
    }  
}