<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MethodPayment extends Model
{
    use SoftDeletes;
    protected $table = 'method_payments';
    protected $fillable = ['name','status'];
    protected $guarded = ['id'];    
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at'];
}
