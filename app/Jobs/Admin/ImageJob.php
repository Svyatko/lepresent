<?php

namespace App\Jobs\Admin;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $item;

    /**
     * Create a new job instance.
     *
     * @param Item $item
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $files = request()->all()['files'];
        $item = $this->item;

        foreach ($files as $file) {
            $item->images()->create(['path' => $item->saveImg($file)]);
        }
    }
}
