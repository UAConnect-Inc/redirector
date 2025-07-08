<?php

namespace Database\Factories;

use App\Models\RedirectorCampaign;
use App\Models\RedirectorPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RedirectorPostFactory extends Factory
{
    protected $model = RedirectorPost::class;

    public function definition(): array
    {
        return [
            'text' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'redirector_campaign_id' => RedirectorCampaign::factory(),
        ];
    }
}
