<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.com',
            ]);

        $this->call(PolyclinicSeeder::class);
        \App\Models\Patient::factory(10)->create();
    }

}