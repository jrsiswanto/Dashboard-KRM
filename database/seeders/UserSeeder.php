<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Budi Raharjo',
                'email' => 'budi.raharjo@surabaya.go.id',
                'password' => Hash::make('password'),
                'role' => 'super-admin',
                'status' => 'aktif',
                'last_seen' => Carbon::now()->subMinutes(2),
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti.aminah@krm.id',
                'password' => Hash::make('password'),
                'role' => 'operator-field',
                'status' => 'aktif',
                'last_seen' => Carbon::now()->subHours(2),
            ],
            [
                'name' => 'Dodi Widodo',
                'email' => 'd.widodo@krm.id',
                'password' => Hash::make('password'),
                'role' => 'operator-field',
                'status' => 'nonaktif',
                'last_seen' => Carbon::now()->subMonths(6),
            ]
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}