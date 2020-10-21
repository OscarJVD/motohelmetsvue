<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    protected $table = 'persons';
    protected $fillable = ['name','lastName','typeDoc','numberDoc','address','phone','email','user_id','status'];
    protected $guarded = ['id'];    
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
