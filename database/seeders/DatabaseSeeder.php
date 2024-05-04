<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Position;
use App\Models\PositionApplication;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Pooyan Gnb',
            'email' => 'pooyan@gnb.com',
        ]);
        User::factory(300)->create();
        $users = User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                "user_id" => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            Position::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $postions = Position::inRandomOrder()->take(rand(0,4))->get();

            foreach($postions as $postion) {
                PositionApplication::factory()->create([
                    'position_id' => $postion->id,
                    'user_id' => $user->id
                ]);
            }
        }

    }
}
