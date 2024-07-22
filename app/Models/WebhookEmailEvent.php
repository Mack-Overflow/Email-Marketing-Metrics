<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookEmailEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_status_id',
        'record_type',
        'payload'
    ];
}
