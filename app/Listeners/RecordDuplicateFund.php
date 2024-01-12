<?php

namespace App\Listeners;

use App\Events\DuplicateFundWarning;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordDuplicateFund implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(DuplicateFundWarning $event): void
    {
        var_dump($event->fund);
    }
}
