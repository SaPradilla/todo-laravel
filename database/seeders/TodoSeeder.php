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
        $todo =  new Todo();
        $todo->title = 'Comprar mantequilla';
        $todo->description = 'Ir al d1 a comprar mantequilla';
        $todo->user_id =  User::find(1)->id;
        $todo->save();
    }
}
