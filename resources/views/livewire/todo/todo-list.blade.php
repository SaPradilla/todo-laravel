<div class="space-y-6 w-full  bg-white py-5 shadow-sm rounded-sm">
    <h1 class="text-4xl font-bold">Todo List</h1>
    <div class="w-4/5 lg:w-3/5 m-auto flex items-center justify-center gap-1">
        {{-- search bar --}}
        <x-input id="search" class=" w-full" type="text" name="search" required autofocus placeholder="Search"/>

        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="">
            <option value=""> All </option>
            <option value=""> Completed </option>
            <option value=""> Todo </option>
        </select>
    </div>
    {{-- list card --}}
    <div class="lg:max-w-[50rem] grid grid-cols-1 px-5 gap-5 m-auto">
        @if ($todos)
            @foreach ($todos as $todo)
                @livewire('todo.todo-card', ['todo' => $todo], key($todo['id']))
            @endforeach
        @else
            <p class="italic text-gray-500"> You don't have to-do :) </p>
        @endif
    </div>
    <div class="fixed left-1/2 transform -translate-x-1/2 bottom-0 lg:transform-none lg:left-auto lg:right-0 p-10 lg:p-15 z-10">
        <div
            wire:click="$dispatch('handleModal')"
            class="hover:bg-green-500/80 transition-all bg-green-500 rounded-full cursor-pointer">
            <img
                class="w-12 h-12"
                src="{{asset('storage/svgs/addIcon.svg')}}"
            >
        </div>
        
    </div>
    
</div>
