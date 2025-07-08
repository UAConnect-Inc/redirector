<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RedirectorPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'redirector_campaign_id',
    ];

    public function redirectorCampaign(): BelongsTo
    {
        return $this->belongsTo(RedirectorCampaign::class);
    }

    public function postVariations(): HasMany
    {
        return $this->hasMany(RedirectorPostVariation::class);
    }
}
