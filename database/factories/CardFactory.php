<?php

namespace Database\Factories;

use App\Models\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => null,
            'title' => $this->faker->unique()->text($maxNbChars = 50),
            'column_id' => Column::factory(),
            'author_id' => User::factory(),
            'executor_id' => User::factory(),
            'description' => $this->faker->text($maxNbChars = 200)
        ];
    }
    public function column()
    {
        return $this->belongsTo(Column::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
