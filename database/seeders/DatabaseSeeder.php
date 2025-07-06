<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Azerul',
            'email' => 'azerul@gmail.com',
            'password' => bcrypt('123123'),
            'role' => '1',
            'alamat' => '-',
            'no_hp' => '-',
            'tgl_lahir' => '-',
            'jenis_kelamin' => '-'
        ]);
    }
}
