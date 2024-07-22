<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\PostmarkEmailEvent;

class ProcessEmailOpened
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Create a record of PostmarkEmailEvent model
        
        $eventData = [
            'record_type' => $event->record_type,
            'email_status_id' => $event->email_status->id,
            'payload' => $event->payload,
            // Add any other relevant data you want to store
        ];
        \Log::info($eventData);
        
        PostmarkEmailEvent::create($eventData);
    }
}
