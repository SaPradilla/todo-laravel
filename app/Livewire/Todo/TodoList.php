<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On; 

class TodoList extends Component
{
    
    public $todos = [];
    
    public function render()
    {
        return view('livewire.todo.todo-list');
    }

    public function mount()
    {
        $this->loadTodos();
    }

    public function loadTodos()
    {
        $apiUrl = config('services.api.url');
        $user_id = auth()->user()->id;
        $resp = Http::get("{$apiUrl}/todo/{$user_id}");
        if($resp->successful()){
            $this->todos = $resp->json();
        }
    }
    
    #[On('taskCreated')]
    public function taskCreated($bodyData = null)
    {   

        if($bodyData){
            // Save
            $apiUrl = config('services.api.url');
            $resp = Http::post("{$apiUrl}/todo",$bodyData);
            
            if($resp->successful()){

                $this->loadTodos();
                $this->dispatch('clearInputs');
                $this->dispatch('handleModal');
            }
        }
    }
    
    #[On('changeStatus')]
    public function changeStatus(string $id)
    {
        if($id){
            $apiUrl = config('services.api.url');
            $resp = Http::patch("{$apiUrl}/todo/status/{$id}");
            if($resp->successful()){

                $this->loadTodos();

            }
        }
    }

    #[On('deleteTodo')]
    public function deleteTodo(string $id)
    {
        if($id){
            $apiUrl = config('services.api.url');
            $resp = Http::delete("{$apiUrl}/todo/{$id}");
            if($resp->successful()){
                $this->loadTodos();
            }
        }
    }
}
