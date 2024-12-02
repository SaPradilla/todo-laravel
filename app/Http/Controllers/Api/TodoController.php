<?php

namespace App\Http\Controllers\Api;

use App\DTO\TodoDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Jobs\SendRemider;
use App\Services\TodoService;


class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;   
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return response()->json($this->todoService->getAllTodos($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoStoreRequest $request)
    {
        // validate body data
        $validatedData = $request->validated();

        $dto = new TodoDTO(
            $validatedData['title'],
            $validatedData['description'],
            $validatedData['completed'] ?? false,
            $validatedData['user_id'],
        );


        $todo = $this->todoService->createTodo($dto);

        // logs register
        SendRemider::dispatch($todo);

        return response()->json($todo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $todo = $this->todoService->getByIdTodo($id);
        return response()->json($todo, 200);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoUpdateRequest $request, int $id)
    {
        // validate body data
        $validatedData = $request->validated();

        $dto = new TodoDTO(
            $validatedData['title'],
            $validatedData['description'],
            $validatedData['user_id'],
            $validatedData['completed'] ?? false,
        );
        $todo = $this->todoService->updateTodo($id,$dto);

        return response()->json($todo);
    }

    public function changeStatus(int $id)
    {
        $todo = $this->todoService->updateStatus($id);
        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->todoService->deleteTodo($id);
        return response()->json(null, 204);
    }
}
