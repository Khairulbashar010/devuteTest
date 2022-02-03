<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'role_id'=>1,
            'email'=>'admin@gmail.com',
            'password'=>Hash::make(123456789),
        ]);
        User::create([
            'name'=>'User',
            'role_id'=>2,
            'email'=>'user@gmail.com',
            'password'=>Hash::make(123456789),
        ]);
    }
}
