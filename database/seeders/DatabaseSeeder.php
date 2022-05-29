<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Board;
use \App\Models\Column;
use \App\Models\Card;
use \App\Models\Comment;
use \App\Models\Notification;
use \App\Models\Subscription;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory(10)->create();
        $user->each(function (User $user){
            \App\Models\Board::factory(2)->create(['author_id' => $user->id ]);
        });


         Board::all()->each(function (Board $board) use ($user) {
             $board->user()->sync($user->random(), ['created_at' => now()]);
         });

        \App\Models\Column::factory(10)->create();

        Column::all()->each(function (Column $column) use ($user){
        \App\Models\Card::factory(4)->create(['column_id' => $column, 'author_id' => $user->random()->id ]);
        });

        Card::all()->each(function (Card $card) use ($user) {
            \App\Models\Comment::factory(2)->create(['card_id' => $card, 'user_id' => $user->random()->id]);
            \App\Models\Subscription::factory(1)->create(['card_id' => $card, 'user_id' => $user->random()->id]);
            \App\Models\Notification::factory(1)->create(['card_id' => $card]);

        });


        $notification = Notification::all();
        Subscription::all()->each(function (Subscription $subscriptions) use ($notification) {
            $subscriptions->notification()->attach($notification->random(), ['created_at' => now()]);
        });

    }
}
