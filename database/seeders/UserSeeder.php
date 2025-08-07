<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use MongoDB\Laravel\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'kolaborasikarya7@gmail.com',
            'password' => bcrypt('password'),
            'role'=> 'admin'
        ]);

        $this->call([
            BarangSeeder::class,
        ]);
    }
}
