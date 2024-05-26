<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = $this->prepareData();
        foreach ($records as $record) {
            $user = \App\Models\User::create([
                'name' => $record['name'],
                'email' => $record['email'],
                'password' => $record['password'],
                'is_owner' => $record['is_owner'],
            ]);
            $user->ownedCompany()->create(['name' => $record['company']]);
            $user->update(['company_id' => $user->ownedCompany->id]);

            for ($i = 0; $i < 25; $i++) {
                \App\Models\User::create([
                    'name' => fake()->name(),
                    'email' => fake()->unique()->safeEmail(),
                    'email_verified_at' => now(),
                    'company_id' => $user->ownedCompany->id
                ]);
            }
        }
    }

    // prepare data
    public function prepareData()
    {
        $users = [
            [
                'name' => 'Ansh Suman',
                'email' => 'yepansh001@gmail.com',
                'password' => Hash::make('Pa$$w0rd'),
                'company' => 'Yep',
                'is_owner' => 1
            ],
            [
                'name' => 'Shyrel Picache',
                'email' => 'sheryl@sourceitmarketing.com',
                'password' => Hash::make('Pa$$w0rd'),
                'company' => 'Sourceit',
                'is_owner' => 1
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('Pa$$w0rd'),
                'company' => 'Example',
                'is_owner' => 1
            ]
        ];

        return $users;
    }
}
