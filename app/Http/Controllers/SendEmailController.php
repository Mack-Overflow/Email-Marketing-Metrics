<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\EmailStatus;
use App\Mail\PostmarkEmail;
use App\Services\PostmarkService;

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        $mailTo = '*@cztester.com';
        $status = 200;
        $emailStatus = null;

        try {
            // Create EmailStatus and send email via postmark
            $emailStatus = EmailStatus::create([
                'email_template_id' => $request->email_template_id,
                'sent_to' => $request->send_to,
                'subject' => $request->subject,
                'status' => 'unsent'
            ]);
    
            $emailData = [];
    
            // Mail::to($mailTo)->send(new PostmarkEmail($emailData));
            PostmarkService::send($mailTo, $emailData);

            // could replace sent update with webhook, may not be as effective
            $emailStatus->status = 'sent';
        } catch (\Exception $e) {
            // Update EmailStatus
            $emailStatus->status = 'failed';
            $emailStatus->save();
            $status = 400;
        }

        return response()->json(['status' => $emailStatus], $status);
    }
}
