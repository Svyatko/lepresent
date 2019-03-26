<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Image extends Model
{
    protected $fillable = ['path'];
    protected $absolute_path = '/uploads/items/';

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }

    public function getPathAttribute($value) {
        return $this->absolute_path . $value;
    }

    public static function boot() {
        parent::boot();

        static::deleting(function ($image) {
//            dd($image->path);
            Storage::delete($image->path);
        });
    }
}
