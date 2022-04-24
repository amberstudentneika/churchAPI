<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class announcementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::create([
            'memberID' => 1,
            'topic' => "Welcome!",
            'message' => "View All Announcements",
            'image' => "announcementImage.jpg",
            'status' => "active",
        ]);
    }
}
