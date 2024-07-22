<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'version_id',
    ];

    public function versions()
    {
        return $this->hasMany(EmailTemplateVersion::class);
    }

    public function statuses()
    {
        return $this->hasMany(EmailStatus::class);
    }
}
