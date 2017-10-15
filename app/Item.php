<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','desc'];
    // public function Category()
    // {
    //     return $this->belongsTo('App\Category', 'category_id');
    // }
    public function Paket_detail()
    {
        return $this->hasMany('App\Paket_detail', 'item_id');
    }
}
