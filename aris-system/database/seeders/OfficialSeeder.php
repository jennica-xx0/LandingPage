<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Official; // <-- Import the Official model

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Official::create([
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'middle_initial' => 'P.',
            'position' => 'Barangay Captain',
            'display_order' => 1,
        ]);

        Official::create([
            'first_name' => 'Maria',
            'last_name' => 'Clara',
            'middle_initial' => 'S.',
            'position' => 'Barangay Kagawad',
            'display_order' => 2,
        ]);

        Official::create([
            'first_name' => 'Pedro',
            'last_name' => 'Penduko',
            'middle_initial' => 'A.',
            'position' => 'Barangay Kagawad',
            'display_order' => 3,
        ]);

        Official::create([
            'first_name' => 'Gabriela',
            'last_name' => 'Silang',
            'middle_initial' => 'M.',
            'position' => 'SK Chairperson',
            'display_order' => 4,
        ]);
    }
}
