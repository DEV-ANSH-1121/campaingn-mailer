<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('is_owner', 1)->get();
        $users->each(function ($user) {
            for ($i = 0; $i < 5; $i++) {
                $user->templates()->create([
                    'name' => fake()->company(),
                    'subject' => fake()->realTextBetween(15, 30),
                    'content' => fake()->randomHtml(),
                    'is_public' => (rand() % 2),
                ]);
            }
        });
    }
}
