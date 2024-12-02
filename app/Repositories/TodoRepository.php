<?php 

namespace App\Repositories;

use App\Models\Todo;
use App\DTO\TodoDTO;

class TodoRepository
{
    public function getAllByUser(int $user_id)
    {
        return  Todo::where('user_id', $user_id)
        ->orderBy('completed', 'asc')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function create(TodoDTO $dto)
    {
        return Todo::create([
            'title' => $dto->title,
            'description' => $dto->description,
            'completed' => $dto->completed,
            'user_id' => $dto->user_id,
        ]);
    }
    
    public function getById(int $id)
    {
        $todo = Todo::findOrFail($id);
        return $todo;
    }

    public function update(int $id, TodoDTO $dto)
    {
        $todo = Todo::findOrFail($id);
        $todo->update([
            'title' => $dto->title,
            'description' => $dto->description,
            'completed' => $dto->completed,
        ]);
        return $todo;
    }

    public function updateStatus(int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        return $todo;
    }
    public function delete(int $id)
    {
        Todo::destroy($id);
    }
}
