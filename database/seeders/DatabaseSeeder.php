<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Institution::factory(20)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Activity::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => fake()->name(),
            'email' => 'admin@dispendik.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'date_of_birth' => fake()->date(),
            'phone_number' => fake()->phoneNumber(),
            'institution_id' => null,
            'role_id' => 2
        ]);

        \App\Models\User::factory()->create([
            'name' => fake()->name(),
            'email' => 'user@dispendik.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'date_of_birth' => fake()->date(),
            'phone_number' => fake()->phoneNumber(),
            'institution_id' => 2,
            'role_id' => 2
        ]);
    }
}
