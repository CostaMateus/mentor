<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $timestamp = date('Y-m-d');

        $data[] = [
                'google_id'         => null,
                'name'              => null,
                'email'             => 'costa.mack95@gmail.com',
                'verify'            => false,
                'active'            => true,
                'picture'           => null,
                'password'          => Hash::make('password'),
                'email_verified_at' => null,
                'created_at'        => $timestamp,
                'updated_at'        => $timestamp
        ];

        User::insert($data);
    }
}
