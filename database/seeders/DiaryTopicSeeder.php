<?php

namespace Database\Seeders;

use App\Models\DiaryTopic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaryTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiaryTopic::factory()->count(10)->create();
    }
}
