<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RedirectorResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'link',
        'name',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'redirector_campaign_id',
    ];

    public function redirectorCampaign(): BelongsTo
    {
        return $this->belongsTo(RedirectorCampaign::class);
    }
}
