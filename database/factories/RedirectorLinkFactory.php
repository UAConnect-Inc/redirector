<?php

namespace Database\Factories;

use App\Models\RedirectorLink;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RedirectorLinkFactory extends Factory
{
    protected $model = RedirectorLink::class;

    public function definition(): array
    {
        return [
            'destination' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
