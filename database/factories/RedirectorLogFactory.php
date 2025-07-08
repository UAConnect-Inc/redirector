<?php

namespace Database\Factories;

use App\Models\RedirectorLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RedirectorLogFactory extends Factory
{
    protected $model = RedirectorLog::class;

    public function definition(): array
    {
        return [
            'data' => $this->faker->words(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
