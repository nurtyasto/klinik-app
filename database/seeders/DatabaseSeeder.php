<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menggunakan updateOrCreate agar tidak duplikat jika dijalankan ulang
        User::updateOrCreate(
            ['email' => 'admin@klinik.com'],
            [
                'name' => 'Admin Klinik',
                'password' => Hash::make('password'), // pastikan ada password default
            ]
        );

        $this->call([
            PolyclinicSeeder::class,
            PatientSeeder::class,
        ]);
    }
}