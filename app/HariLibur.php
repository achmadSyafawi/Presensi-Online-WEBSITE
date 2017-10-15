<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HariLibur extends Model
{
    protected $table = 'hari_libur'; // table name
    protected $primaryKey = 'id'; // default id
    
    protected $fillable = ['date','summary'];

}