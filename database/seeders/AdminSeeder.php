<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name' => 'Eugen Schlosser',
            'email' => 'e.schlosser.de@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('nokia060'), // password
            'role' => 'admin',
            'remember_token' => Str::random(10)
        ]);
        $admin->save();
    }
}
