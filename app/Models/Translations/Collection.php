<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collection_translations';
    protected $fillable = ['name', 'locale'];
}
