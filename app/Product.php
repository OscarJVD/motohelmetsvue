<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['barcode','name','quantity','price','features','images','brand_id','subcategory_id','status'];
    protected $guarded = ['id'];    
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function Subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
    public function promotions()
    {
        return $this->hasMany('App\promotions');
    }
}
