<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedirectorLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'redirector_post_id',
        'redirector_resource_id',
    ];

    public function redirectorPost(): BelongsTo
    {
        return $this->belongsTo(RedirectorPost::class);
    }

    public function redirectorResource(): BelongsTo
    {
        return $this->belongsTo(RedirectorResource::class);
    }

    public function utmData(): array
    {
        return [
            'utm_source' => $this->redirectorResource->utm_source ?? $this->redirectorResource->redirectorCampaign->utm_source ?? null,
            'utm_medium' => $this->redirectorResource->utm_medium ?? $this->redirectorResource->redirectorCampaign->utm_medium ?? null,
            'utm_campaign' => $this->redirectorResource->utm_campaign ?? $this->redirectorResource->redirectorCampaign->utm_campaign ?? null,
            'utm_term' => $this->redirectorResource->utm_term ?? $this->redirectorResource->redirectorCampaign->utm_term ?? null,
            'utm_content' => $this->redirectorResource->utm_content ?? $this->redirectorResource->redirectorCampaign->utm_content ?? null,
        ];
    }
}
