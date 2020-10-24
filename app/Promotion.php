<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;
    protected $table = 'promotions';
    protected $fillable = ['starDate','endDate','status','porcentage','priceBefore','priceAfter','product_id'];
    protected $guarded = ['id'];    
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

     public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}

