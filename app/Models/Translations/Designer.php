<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    protected $table = 'designer_translations';
    protected $fillable = ['title', 'image_url', 'banner_url', 'locale'];

    public function toArray()
    {
        return $this->title;
    }
}
