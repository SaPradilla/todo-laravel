<x-dialog-modal wire:model.live="isOpen">

    <x-slot name="title">
        {{ __('Create todo') }}
    </x-slot>

    <x-slot name="content">
        {{-- form add todo --}}
        <form wire:submit='submit' class="flex flex-col space-y-5 px-6">
            <x-input wire:model='title' id="title" class="block mt-1 w-full" type="text" name="title" required autofocus
                placeholder="Title" />
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            <x-input wire:model='description' id="description" class="block mt-1 w-full" type="text" name="description"
                required autofocus placeholder="Description" />
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <div class="flex items-center gap-5">
                <x-checkbox wire:model='completed' id="completed" name="completed" />
                <label for="completed">Is Done?</label>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            {{ __('Close') }}
        </x-secondary-button>
        <x-button class="ml-5" wire:click="submit">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-dialog-modal>