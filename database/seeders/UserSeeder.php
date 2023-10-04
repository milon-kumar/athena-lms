<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Super Admin
        User::create([
            'name' => 'Milon Kumar',
            'email' => 'milon@superadmin.com',
            'password' => Hash::make('milon@superadmin.com'),
            'type' => 'super_admin',
            'is_delete'=>false,
        ]);


        User::create([
            'name' => 'Athena Science Academy',
            'email' => 'athenawebapp@gmail.com',
            'password' => Hash::make('Athena_APP*04072022#'),
            'type' => 'super_admin',
            'is_delete'=>false,
        ]);

        //Create Admin
        User::create([
            'name' => 'Admin',
            'email' => 'example@admin.com',
            'password' => Hash::make('example@admin.com'),
            'type' => 'admin',
            'is_delete'=>true,
        ]);

        //Create Teacher
        User::create([
            'name' => 'Teacher',
            'email' => 'example@teacher.com',
            'password' => Hash::make('example@teacher.com'),
            'type' => 'admin',
            'is_delete'=>true,
        ]);

        //Create Official Member
        User::create([
            'name' => 'Official',
            'email' => 'example@official.com',
            'password' => Hash::make('example@official.com'),
            'type' => 'admin',
            'is_delete'=>true,
        ]);

        //Create Student
        User::create([
            'name' => 'Student',
            'email' => 'example@student.com',
            'password' => Hash::make('example@student.com'),
            'type' => 'student',
            'is_approve'=>true,
            'is_active'=>true,
            'is_delete'=>true,
        ]);

    }
}
