<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trans_detail extends Model
{
    protected $table = 'trans_details';
    protected $fillable = ['packet_id', 'trans_id', 'qty'];
    public function Paket()
    {
        return $this->belongsTo('App\Paket', 'packet_id');
    }
    
    public function Transaksi()
    {
        return $this->belongsTo('App\Transaksi', 'trans_id');
    }

}