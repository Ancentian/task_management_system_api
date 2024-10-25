<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Create 10 random tasks using the factory
        Task::factory()->count(10)->create();
    }
}
