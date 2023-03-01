<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Super Admin',
            'email'=>'super-admin@neuralwebx.com',
            'phone'=>'+8801878005537',
            'username'=>'super_admin',
            'status'=>1,
            'dob'=>fake()->date(),
            'address'=>fake()->address(),
            'password'=>bcrypt('123456'),
            'image'=>'nabil.png',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id'               => Role::where('name', '=', 'Super Admin')->first()->id,
        ]);
    }
}