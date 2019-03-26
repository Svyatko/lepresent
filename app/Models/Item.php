<?php

namespace App\Models;

use App\Events\ItemDeleted;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = Translations\Item::class;
    public $translatedAttributes = ['name', 'text', 'character'];

    protected $fillable = ['category_id', 'style_id', 'brand_id', 'designer_id', 'price', 'is_sale', 'model_name', 'sex_id'];

    public function setBrandIdAttribute($value) {
        $brand_arr = explode('/', $value);

        $this->attributes['model_name'] = $brand_arr[0];

        if(last(explode('\\',$brand_arr[0])) == 'Designer') {
            $this->attributes['designer_id'] = $brand_arr[1];
        } else {
            $this->attributes['brand_id'] = $brand_arr[1];
        }

    }

    public function setIsSaleAttribute() {
        $this->attributes['is_sale'] = 1;
    }

    public function sizes() {
        return $this->belongsToMany('App\Models\Size');
    }

    public function colors() {
        return $this->belongsToMany('App\Models\Color');
    }

    public function images() {
        return $this->hasMany('App\Models\Image');
    }

    public function saveImg($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs(
            'uploads/items', $filename
        );

        return $filename;
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function ($item) {
            event(new ItemDeleted($item));
        });
    }
}
