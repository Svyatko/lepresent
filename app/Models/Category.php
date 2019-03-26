<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $fillable = ['slug'];

    public $translationModel = \App\Models\Translations\Category::class;
    public $translatedAttributes = ['name'];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }
}
