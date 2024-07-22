<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;


class PostmarkController extends Controller
{
    public function opened(Request $request)
    {
        // Extract necessary data from the request
        $eventData = $request->all();

        // Fire an event with the extracted data
        Event::dispatch(new \App\Events\EmailOpenedEvent($eventData));

        // Return a response to acknowledge receipt of the webhook
        return response()->json(['status' => 'success'], 200);
    }

    public function bounce(Request $request)
    {
        // Extract necessary data from the request
        $eventData = $request->all();

        // Fire an event with the extracted data
        Event::dispatch(new \App\Events\EmailBounceEvent($eventData));

        // Return a response to acknowledge receipt of the webhook
        return response()->json(['status' => 'success'], 200);
    }
}
