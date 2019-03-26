<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    protected $fillable = ['image', 'banner', 'is_vip'];

    private $path = '/uploads/designers';

    use \Dimsav\Translatable\Translatable;

    public $translationModel = \App\Models\Translations\Designer::class;
    public $translatedAttributes = ['title', 'image_url', 'banner_url'];


    public function setImageAttribute($value) {
        $this->attributes['image'] = "/uploads/designers/$value";
    }

    public function setBannerAttribute($value) {
        $this->attributes['banner'] = "/uploads/designers/$value";
    }
}