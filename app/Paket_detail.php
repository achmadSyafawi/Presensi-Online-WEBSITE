<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket_detail extends Model
{
    protected $table = 'packet_details';
    protected $fillable = ['packet_id', 'item_id'];
    public function Paket()
    {
        return $this->belongsTo('App\Paket', 'packet_id');
    }
    
    public function Item()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
}