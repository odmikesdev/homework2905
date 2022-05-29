<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
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
            'text' => $this->faker->sentence(rand(10, 20)),
            'card_id' => Card::factory(),
        ];

    }
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
