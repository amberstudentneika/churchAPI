<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
class superAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'firstname' => "Jon",
            'lastname' => "Shan",
            'email' => "superadmin@gmail.com",
            'password' => Hash::make("password"),
            'role' => '3',
            'gender' => 'male',
            'image' => 'tempProfileImage.png',
            'status' => "active",
        ]);
    }
}
