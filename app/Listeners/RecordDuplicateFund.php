<?php

namespace App\Listeners;

use App\Events\DuplicateFundWarning;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Duplicate;
use Illuminate\Support\Facades\Log;

class RecordDuplicateFund implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(DuplicateFundWarning $event): void
    {
        Log::info('DuplicateFundWarning: ' . $event->fund->id);
        $duplicate = new Duplicate();
        $duplicate->fund_id = $event->fund->id;
        $duplicate->name = $event->fund->name;
        $duplicate->save();
        Log::info('Duplicated saved');

    }
}
