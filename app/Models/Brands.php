<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'is_vip'];
}
