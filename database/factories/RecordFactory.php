<?php

namespace Database\Factories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    protected $model = Record::class;

    public function definition(): array
    {
        $faker = static::faker();
        
        return [
            'title' => $faker->sentence(3),
            'content' => $faker->paragraph(2),
        ];
    }
}
