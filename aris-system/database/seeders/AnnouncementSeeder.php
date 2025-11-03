<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement; // <-- Import the Announcement model

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::create([
            'title' => 'Community Cleanup Drive',
            'content' => 'Join us this Saturday for a community-wide cleanup event. Bags and gloves will be provided. Let\'s make our barangay beautiful!',
            'start_date' => '2023-11-01',
            'end_date' => '2023-11-10',
        ]);

        Announcement::create([
            'title' => 'Free Vaccination Program',
            'content' => 'We are offering free anti-flu shots for all senior citizens at the barangay hall from 9 AM to 5 PM.',
            'start_date' => '2023-10-15',
            'end_date' => '2023-10-30',
        ]);

        Announcement::create([
            'title' => 'Basketball Tournament Registration',
            'content' => 'Registration for the annual inter-zone basketball league is now open. Sign up your team at the Sangguniang Kabataan office.',
            'start_date' => '2023-11-05',
            'end_date' => '2023-11-25',
        ]);
    }
}
