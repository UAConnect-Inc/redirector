<?php

namespace Database\Factories;

use App\Models\RedirectorCampaign;
use App\Models\RedirectorResource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RedirectorResourceFactory extends Factory
{
    protected $model = RedirectorResource::class;

    public function definition(): array
    {
        return [
            'link' => $this->faker->word(),
            'utm_source' => $this->faker->word(),
            'utm_medium' => $this->faker->word(),
            'utm_campaign' => $this->faker->word(),
            'utm_term' => $this->faker->word(),
            'utm_content' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'redirector_campaign_id' => RedirectorCampaign::factory(),
        ];
    }
}
