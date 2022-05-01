<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class memberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'firstname' => "Nihara",
            'lastname' => "Win",
            'email' => "member@gmail.com",
            'password' => Hash::make("password"),
            'role' => '0',
            'gender' => 'female',
            'image' => 'tempProfileImage.png',
            'status' => "active",
        ]);
       
    }
}
