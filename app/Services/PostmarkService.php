<?php

namespace App\Services;

use Postmark\PostmarkClient;

class PostmarkService
{
    public static function send($mailTo, $emailData)
    {
        $client = new PostmarkClient(config('mail.mailers.postmark.api_token'));
        $fromEmail = config('mail.mailers.postmark.from_email');
        $subject = "Hello from Postmark";
        $htmlBody = "<strong>Hello</strong> dear Postmark user.";
        $textBody = "Hello dear Postmark user.";
        $tag = "example-email-tag";
        $trackOpens = true;
        $trackLinks = "None";
        $messageStream = "outbound";
        
        // Send an email:
        $sendResult = $client->sendEmail(
        $fromEmail,
        $mailTo,
        $subject,
        $htmlBody,
        $textBody,
        $tag,
        $trackOpens,
        NULL, // Reply To
        NULL, // CC
        NULL, // BCC
        NULL, // Header array
        NULL, // Attachment array
        $trackLinks,
        NULL, // Metadata array
        $messageStream
        );
    }
}