<?php

namespace Database\Factories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    protected $model = Record::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'content' => fake()->paragraph(2),
        ];
    }
}
