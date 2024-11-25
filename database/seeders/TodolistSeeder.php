<?php

namespace Database\Seeders;

use App\Models\Todolist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todolist::insert([
            [
                'title' => 'Belajar Laravel',
                'desc' => 'Belajar membuat todolist',
                'status' => 0,
            ],
            [
                'title' => 'Belajar Laravel',
                'desc' => 'Belajar membuat API',
                'status' => 1,
            ]
        ]);
    }
}