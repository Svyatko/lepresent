<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Designer;
use App\Models\Item;
use App\Observers\Admin\CategoryObserver;
use App\Observers\Admin\DesignerObserver;
use App\Observers\Admin\ItemObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Designer::observe(DesignerObserver::class);
        Category::observe(CategoryObserver::class);
        Item::observe(ItemObserver::class);

        Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
