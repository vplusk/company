<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'company_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Greg',
            'email' => 'greg@example.com',
            'company_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'company_id' => 2,
        ]);

    }
}
