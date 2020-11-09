<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'orders';
    protected $fillable = ['dateOrder','total','oservations','person_id','status'];
    protected $guarded = ['id'];    
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
    //relacion muchos a muchos entre order->product
     public function products()
     {
         return $this->belongsToMany('App\Product');
     }
}
