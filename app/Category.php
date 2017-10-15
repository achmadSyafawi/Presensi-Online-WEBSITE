<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // table name
    protected $primaryKey = 'id'; // default id
    
    // protected $timestamps = false; // disable auto date
    
    protected $fillable = ['desc', 'name']; 
    
    public function Items()
    {
        return $this->hasMany('App\Item', 'category_id');
    }
    public function Pakets()
    {
        return $this->hasMany('App\Paket','category_id');
    }
}
