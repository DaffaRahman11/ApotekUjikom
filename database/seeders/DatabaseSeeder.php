<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'=> 'Admin Apotek',
            'email'=> 'admin@gapotek.com',
            'password'=> Hash::make('123'),
            'email_verified_at'=>now(),
            'remember_token'=> Str::random(10),

        ]);

        $this->call([
            SuplierSeeder::class,
            ObatSeeder::class,
        ]);
    }
}
