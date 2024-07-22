<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplateVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_template_id',
        'body',
        'subject'
    ];
}
