<?php

namespace App\Listeners;

use App\Events\SeriesDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteSeriesCover
{
    /**
     * Create the event listener.
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
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesDeleted $event)
    {
        Storage::disk('public')->delete([$event->cover]);
    }
}
