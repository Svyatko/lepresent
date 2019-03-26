<?php

namespace App\Observers\Admin;

use App\Models\Designer;
use App\Services\DesignerService;
use Illuminate\Support\Facades\Storage;

class DesignerObserver
{
    /**
     * Handle the designer "created" event.
     *
     * @param  \App\Models\Designer  $designer
     * @return void
     */
    public function created(Designer $designer)
    {
        $data = request()->all();
        $designer->fill([
            'title:ru' => $data['title_ru'],
            'title:en' => $data['title_en'],

            'image_url:ru' => $data['main_banner_ru'],
            'image_url:en' => $data['main_banner_en'],

            'banner_url:ru' => $data['additional_banner_ru'],
            'banner_url:en' => $data['additional_banner_en'],
        ]);

        $designer->save();
    }

    /**
     * Handle the designer "updated" event.
     *
     * @param  \App\Models\Designer  $designer
     * @return void
     */
    public function updated(Designer $designer)
    {
        $data = request()->all();

        try {
            $designer->translate('ru')->title = $data['title_ru'];
            $designer->translate('ru')->image_url = $data['main_banner_ru'];
            $designer->translate('ru')->banner_url = $data['additional_banner_ru'];

            $designer->translate('en')->title = $data['title_en'];
            $designer->translate('en')->image_url = $data['main_banner_en'];
            $designer->translate('en')->banner_url = $data['additional_banner_en'];
        } catch (\Exception $exception) {

        }
    }

    /**
     * Handle the designer "deleted" event.
     *
     * @param  \App\Models\Designer  $designer
     * @return void
     */
    public function deleted(Designer $designer)
    {
        Storage::disk('local')->delete($designer->image);
        Storage::disk('local')->delete($designer->banner);
    }

    /**
     * Handle the designer "restored" event.
     *
     * @param  \App\Models\Designer  $designer
     * @return void
     */
    public function restored(Designer $designer)
    {
        //
    }

    /**
     * Handle the designer "force deleted" event.
     *
     * @param  \App\Models\Designer  $designer
     * @return void
     */
    public function forceDeleted(Designer $designer)
    {
        //
    }
}
