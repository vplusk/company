<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'company_id' => 1,
            'title' => 'Spaceship OS',
            'description' => 'First OS for running spaceship',
            'price' => 2200
        ]);

        Project::create([
            'company_id' => 2,
            'title' => 'Car soft',
            'description' => 'Software for car autopilot',
            'price' => 1500
        ]);
    }
}
