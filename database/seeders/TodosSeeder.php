<?php

namespace Database\Seeders;

use App\Models\Todos;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use League\CommonMark\Node\Block\Paragraph;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userid = User::pluck('id_user');
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++){
            Todos::insert([
                'id_user' => $userid->random(),
                'title' => $faker->sentence,
                'desc' => $faker->paragraph,
                'status' => $faker->boolean,
                'deadline' => $faker->dateTimeBetween('2024-01-01', '2025-01-01'),
            ]);
        }
    }
}
