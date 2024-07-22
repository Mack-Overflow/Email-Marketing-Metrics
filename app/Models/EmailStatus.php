<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_template_id',
        'sent_to',
        'subject',
        'status'
    ];

    public function emailTemplate()
    {
        return $this->belongsTo(EmailTemplate::class);
    }
}
