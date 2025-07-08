<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedirectorPostVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'redirector_resource_id',
        'redirector_post_id',
    ];

    public function redirectorResource(): BelongsTo
    {
        return $this->belongsTo(RedirectorResource::class);
    }

    public function redirectorPost(): BelongsTo
    {
        return $this->belongsTo(RedirectorPost::class);
    }
}
