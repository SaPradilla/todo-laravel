<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);

        $todos = [
            [
                'title' => 'Comprar mantequilla',
                'description' => 'Ir al d1 a comprar mantequilla',
                'user_id' => $user->id,
                'completed'=>false,
            ],
            [
                'title' => 'Migracion de todo',
                'description' => 'crear la table de todo',
                'user_id' => $user->id,
                'completed'=>false,
            ],
            [
                'title' => 'Seeder todo',
                'description' => 'crear seeder para llenar los todo',
                'user_id' => $user->id,
                'completed'=>true,
            ],
            [
                'title' => 'Gym',
                'description' => 'Ir al gimnasio por la tarde',
                'user_id' => $user->id,
                'completed'=>true,
            ],
        ];

        foreach ($todos as $todoData) {
            $todo = new Todo();
            $todo->title = $todoData['title'];
            $todo->description = $todoData['description'];
            $todo->completed = $todoData['completed'];
            $todo->user_id = $todoData['user_id'];
            $todo->save();
        }
    }
}
