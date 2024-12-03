<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On; 

class TodoList extends Component
{
    
    public $todos = [];
    public $query = '';
    public $filter_status = null;

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
        $user_id = auth()->user()->id;
        $apiUrl = config('services.api.url');
        $url = "{$apiUrl}/todo/";
        $params = [];

        // one of the two may be one
        if(!is_null($this->query) || !is_null($this->filter_status)){
            // fill the params array
            $params = [
                'title' => $this->query,
                'completed' => $this->filter_status,
            ];
        }else {
            // If there are no filters, the user_id is added to the URL c:
            $url .= $user_id;
        }
        
        // get the todo's
        $resp = Http::get($url, $params);

        if ($resp->successful()) {
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
