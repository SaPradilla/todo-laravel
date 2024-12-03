<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Livewire\Attributes\On; 

class ModalForm extends Component
{
    public $isOpen = false;
    public $title = '';
    public $description = '';
    public $completed = false;

    
    protected $rules = [
        'title' => 'required|min:4|max:40',
        'description' => 'required|min:4|max:255',
        'completed'=> 'required'
    ];

    
    #[On('handleModal')]
    public function handleModal()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {   
        return view('livewire.todo.modal-form');
    }
    public function submit()
    {
        // validate data send, the $rules is the validator
        $this->validate();

        $user_id = auth()->user()->id;

        $bodyData = [
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
            'user_id' => $user_id,
        ];
        // send todo data to todolist component
        $this->dispatch('taskCreated',$bodyData);
    }
    #[On('clearInputs')]
    public function clearInputs(){
        $this->title = '';
        $this->description = '';
        $this->completed = false;
    }
}
