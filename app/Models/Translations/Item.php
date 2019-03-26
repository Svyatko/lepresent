<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item_translations';
    protected $fillable = ['name', 'text', 'character', 'locale'];

    public function original() {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
}
