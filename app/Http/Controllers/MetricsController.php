<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailStatus;
use App\Models\EmailTemplateVersion;

class MetricsController extends Controller
{
    public function getEmailOpenedRate(Request $request)
    {
        $email_template_id = $request['email_template_id'];
        $emailTemplate = EmailTemplateVersion::find($email_template_id);

        $email_statuses_opened_count = EmailStatus::where('email_template_version_id', $email_template_id)
            ->where('status', 'opened')
            ->get()->count();
        
        $email_statuses_sent_count = EmailStatus::where('email_template_version_id', $email_template_id)
            ->where('status', 'sent')
            ->get()->count();

        // Do calculation with $email_statuses
        $email_opened_rate = $email_statuses_opened_count / ($email_statuses_sent_count + $email_statuses_opened_count);
        
        return response()->json(['email_opened_rate' => $email_opened_rate, ], 200);
    }
}
