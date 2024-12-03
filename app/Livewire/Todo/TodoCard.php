<?php

namespace App\Livewire\Todo;

use Livewire\Component;

class TodoCard extends Component
{
    public $todo;
    public $confirmDeleteTodo = false;


    public function deleteTodo()
    {
        $this->dispatch('deleteTodo',$this->todo['id']);
    }

    public function render()
    {
        return view('livewire.todo.todo-card');
    }
    public function mount($todo)
    {
        $this->todo = $todo;
    }
    
    public function changeStatus()
    {
        $this->todo['completed'] = !$this->todo['completed'];
        // send to todolist component
        $this->dispatch('changeStatus',$this->todo['id']);
    }
    
    
}
