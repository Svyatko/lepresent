<?php

namespace App\Observers\Admin;

use App\Jobs\Admin\ImageJob;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class ItemObserver
{
    /**
     * Handle the item "created" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function created(Item $item)
    {
        $data = request()->all();
        $item->sizes()->sync($data['sizes']);
        $item->colors()->sync($data['colors']);

        $item->fill([
            'ru' => [
                'name' => $data['title_ru'],
                'text' => $data['text_ru'],
                'character' => $data['character_ru'],
            ],
            'en' => [
                'name' => $data['title_en'],
                'text' => $data['text_en'],
                'character' => $data['character_en'],
            ],
        ]);

        dispatch(new ImageJob($item));
    }

    /**
     * Handle the item "updated" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function updated(Item $item)
    {
        $data = request()->all();

        $item->sizes()->sync($data['sizes']);

        $item->translate('ru')->name = $data['title_ru'];
        $item->translate('ru')->text = $data['text_ru'];
        $item->translate('ru')->character = $data['character_ru'];

        $item->translate('en')->name = $data['title_en'];
        $item->translate('en')->text = $data['text_en'];
        $item->translate('en')->character = $data['character_en'];

        if(count($data['files']) > 0)
            dispatch(new ImageJob($item));
    }

    /**
     * Handle the item "deleted" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function deleted(Item $item)
    {
        //
    }

    /**
     * Handle the item "restored" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function restored(Item $item)
    {
        //
    }

    /**
     * Handle the item "force deleted" event.
     *
     * @param  \App\Models\Item  $item
     * @return void
     */
    public function forceDeleted(Item $item)
    {
        //
    }
}
