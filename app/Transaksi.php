<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transactions';
    protected $id = 'id';
    protected $fillable = ['due_date','customer_id', 'waktu', 'venue', 'status', 'total'];
    public function Customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
    public function Detail()
    {
        return $this->hasMany('App\Trans_detail', 'trans_id');
    }
}