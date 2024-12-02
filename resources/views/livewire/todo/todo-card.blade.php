<div
    class="flex items-center justify-between lg:justify-between lg:max-h-10 rounded-lg border border-solid border-gray-500/40 space-x-5 py-2 px-3 ">

    <div class="flex gap-4">
        <div wire:click='changeStatus' @class([ 'bg-green-500/50'=> $todo['completed'],
            'border-gray-500/70' => !$todo['completed'],
            'rounded-full',
            'w-6',
            'h-6',
            'flex',
            'cursor-pointer',
            'border',
            'hover:bg-green-500/20' => !$todo['completed'],
            'transition-all',
            ])
            >
            @if ($todo['completed'])
            <img class="min-h-6 min-w-6" src="{{asset('storage/svgs/doneIcon.svg')}}" />
            @endif
        </div>
        <div class="flex flex-col lg:flex-row items-start lg:gap-6  whitespace-nowrap truncate">
            <h3 @class([ 'line-through'=> $todo['completed'],
                'font-bold',
                ])
                >{{ $todo['title'] }}
            </h3>
            <p @class([ 'line-through'=> $todo['completed'],
                'text-gray-400',
                'font-extralight',
                ])
                > {{ $todo['description'] }}</p>
        </div>
    </div>

    <div wire:click='deleteTodo'
        class="cursor-pointer border hover:bg-red-300/50 w-9 h-9 transition-all rounded-full flex items-center justify-center">
        <img class="w-4 h-4 " src="{{asset('storage/svgs/deleteIcon.svg')}}">
    </div>
</div>