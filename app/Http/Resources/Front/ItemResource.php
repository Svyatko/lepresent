<?php

namespace App\Http\Resources\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'App\Http\Resources\Front\ImageResource';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => $this->category->translate('ru')->name,
            'name' => $this->translate('ru')->name,
            'character' => $this->translate('ru')->character,
            'text' => $this->translate('ru')->text,
            'price' => $this->price,
            'link' => route('api.show.item', $this->id),
            'images' => [
                $this->images()->select('path')->get(),
            ],
            'sale' => null,
        ];
    }
}
