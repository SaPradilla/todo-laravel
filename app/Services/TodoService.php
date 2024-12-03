<?php 

namespace App\Services;

use App\Repositories\TodoRepository;
use App\DTO\TodoDTO;

class TodoService
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function getAllTodos(int $user_id)
    {
        return $this->todoRepository->getAllByUser($user_id);
    }

    public function getByIdTodo(int $id)
    {
        return $this->todoRepository->getById($id);
    }
    public function getTodosQuery(string $title = null,bool $completed = null)
    {
        return $this->todoRepository->getTodosQuery($title,$completed);
    }

    public function createTodo(TodoDTO $dto)
    {
        return $this->todoRepository->create($dto);
    }

    public function updateTodo(int $id, TodoDTO $dto)
    {
        return $this->todoRepository->update($id, $dto);
    }
    public function updateStatus(int $id)
    {
        return $this->todoRepository->updateStatus($id);
    }

    public function deleteTodo(int $id)
    {
        return $this->todoRepository->delete($id);
    }
}
