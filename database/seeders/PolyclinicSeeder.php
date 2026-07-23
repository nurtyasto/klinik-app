<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Polyclinic;

class PolyclinicSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Poli Gigi', 'cost' => 100000, 'description' => 'Pelayanan kesehatan gigi'],
            ['name' => 'Poli Anak', 'cost' => 150000, 'description' => 'Pelayanan kesehatan anak'],
            ['name' => 'Poli Jantung', 'cost' => 100000, 'description' => 'Pelayanan kesehatan jantung'],
        ];
        Polyclinic::insert($data);
    }
}