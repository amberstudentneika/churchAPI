<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Hash;
class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'firstname' => "Lora",
            'lastname' => "King",
            'email' => "admin@gmail.com",
            'password' => Hash::make("password"),
            'role' => '1',
            'gender' => 'female',
            'image' => 'tempProfileImage.png',
            'status' => "active",
        ]);
    }
}
