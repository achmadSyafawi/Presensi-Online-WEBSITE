<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'packets';
    protected $fillable = ['name','desc','harga', 'category_id',];
    public function Paket_detail()
    {
        return $this->hasMany('App\Paket_detail', 'packet_id');
    }
    public function Category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    
}