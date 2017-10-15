<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi'; // table name
    protected $primaryKey = 'id'; // default id
    
    protected $fillable = ['name','longi', 'lati'];

    public function Absensi()
    {
        return $this->hasMany('App\Absensi', 'id_lokasi');
    } 

}