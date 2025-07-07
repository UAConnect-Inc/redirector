<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RedirectorCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
    ];

    public function redirectorResources(): HasMany
    {
        return $this->hasMany(RedirectorResource::class);
    }
}
