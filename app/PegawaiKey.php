<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PegawaiKey extends Model
{
    protected $table = 'pegawai_key'; // table name
    protected $primaryKey = 'nidn'; // default id
    
    protected $fillable = ['nidn','uuid','status']; 
}