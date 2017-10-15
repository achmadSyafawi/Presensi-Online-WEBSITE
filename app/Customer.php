<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers'; // table name
    protected $primaryKey = 'id'; // default id
    
    protected $fillable = ['nama','alamat','no_telp']; 
}