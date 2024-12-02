<div>
    @if($isOpen)

        <div class="fixed bg-black/30 inset-0 flex items-center justify-center z-20">

            <div class="bg-white w-80  shadow-lg rounded-lg space-y-7 py-10">
                <h1 class="text-center text-2xl font-bold py-2">Create todo</h1>
                <form wire:submit='submit' class="flex flex-col space-y-5 px-6">
                    

                    <x-input wire:model='title' id="title" class="block mt-1 w-full" type="text" name="title" required autofocus placeholder="Title"/>
                    @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    <x-input wire:model='description' id="description" class="block mt-1 w-full" type="text" name="description" required autofocus placeholder="Description"/>
                    @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                    <div>
                        <x-checkbox wire:model='completed' id="completed" name="completed" />
                        <label for="completed">Is Done?</label>
                    </div>
                    <div class="w-full flex gap-2">
                        <x-button
                            type="button"
                            wire:click='handleModal'
                            class="flex items-center justify-center w-full text-center bg-red-500 text-red-500 py-1  hover:bg-red-500/80 ">
                            {{ __('Cancel') }}
                        </x-button> 
                        <x-button class="w-full flex items-center justify-center">
                        {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </div>

        </div>
    
    @endif
</div>
