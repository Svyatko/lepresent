<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $fillable = ['title', 'image'];
    protected $image_path = '/uploads/collections';

    public $translationModel = \App\Models\Translations\Collection::class;
    public $translatedAttributes = ['name'];

    public static function storeImg($file) {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs(
            '/collections', $filename
        );

        return $filename;
    }

    public function getImageAttribute($value) {
        return "$this->image_path/$value";
    }
}
