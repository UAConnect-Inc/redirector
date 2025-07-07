<?php

namespace Database\Factories;

use App\Models\RedirectorCampaign;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RedirectorCampaignFactory extends Factory
{
    protected $model = RedirectorCampaign::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'utm_source' => $this->faker->word(),
            'utm_medium' => $this->faker->word(),
            'utm_campaign' => $this->faker->word(),
            'utm_term' => $this->faker->word(),
            'utm_content' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
