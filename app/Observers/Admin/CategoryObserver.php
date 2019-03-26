<?php

namespace App\Observers\Admin;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *2
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        $data = request()->all();

        $category->fill([
            'ru' => ['name' => $data['name_ru']],
            'en' => ['name' => $data['name_en']],
        ]);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        $data = request()->all();

        $category->translate('ru')->name = $data['name_ru'];
        $category->translate('en')->name = $data['name_en'];
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
