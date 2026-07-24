<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = [
            [
                'id' => 11,
                'no' => 'RM-0001',
                'name' => 'Nurtyasto Hadi',
                'gender' => 'Laki-laki',
                'age' => '12',
                'photo' => null,
                'address' => 'Jl. Warga',
                'created_at' => '2026-07-23 05:24:06',
                'updated_at' => '2026-07-23 05:24:06',
            ],
            [
                'id' => 12,
                'no' => 'RM-0002',
                'name' => 'anonymous',
                'gender' => 'Laki-laki',
                'age' => '22',
                'photo' => 'patients/NtdIc2Qor5JOunxx116nNXSWFmyQg2uzM4psp7aa.jpg',
                'address' => 'Jalan Jalan',
                'created_at' => '2026-07-23 05:24:38',
                'updated_at' => '2026-07-23 21:58:43',
            ],
        ];

        foreach ($patients as $patientData) {
            Patient::updateOrCreate(
                ['id' => $patientData['id']], // Kondisi pencarian berdasarkan ID
                $patientData
            );
        }
    }
}