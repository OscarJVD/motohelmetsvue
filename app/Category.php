<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name','status'];
    protected $guarded = ['id'];    
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
}
