<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class AdResource extends Model {
        use HasFactory;

        protected $fillable = [
        'type',
        'link',
        'ad_campaign_id',
        ];

        public function adCampaign(): BelongsTo
        {
        return $this->belongsTo(AdCampaign::class);
        }
    }
