<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function adResources(): HasMany
    {
        return $this->hasMany(AdResource::class);
    }
}
