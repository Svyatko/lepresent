<?php

namespace App\Listeners;

use App\Events\ItemDeleted;
use App\Models\Item;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class DeleteRelatedImages
{
    /**
     * Create the event listener.
     *
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ItemDeleted  $event
     * @return void
     */
    public function handle(ItemDeleted $event)
    {
        $images = $event->item->images;
        foreach ($images as $image) {
            Storage::disk('local')->delete($image->path);
        }
    }
}
