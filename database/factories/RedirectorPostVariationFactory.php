<?php

namespace Database\Factories;

use App\Models\RedirectorPost;
use App\Models\RedirectorPostVariation;
use App\Models\RedirectorResource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RedirectorPostVariationFactory extends Factory
{
    protected $model = RedirectorPostVariation::class;

    public function definition(): array
    {
        return [
            'text' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'redirector_resource_id' => RedirectorResource::factory(),
            'redirector_post_id' => RedirectorPost::factory(),
        ];
    }
}
