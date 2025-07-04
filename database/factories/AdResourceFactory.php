<?php

namespace Database\Factories;

use App\Models\AdCampaign;
use App\Models\AdResource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AdResourceFactory extends Factory{
    protected $model = AdResource::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),//
'link' => $this->faker->word(),
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),

'ad_campaign_id' => AdCampaign::factory(),
        ];
    }
}
