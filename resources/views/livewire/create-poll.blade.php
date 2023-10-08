<div>
    <form wire:submit.prevent="createPoll">
        <label for="title">Poll Title</label>
        <input type="text" wire:model.live="title" class="border border-gray-400 p-2 w-full">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="my-4">
            <button class="btn" wire:click.prevent="addOption">
                Add an Option
            </button>
        </div>

        <div>
            @foreach ($options as $index => $option)
                <div class="mb-4">
                    <label for="option_{{ $index }}">Option {{ $index + 1 }}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model="options.{{ $index }}"
                            class="border border-gray-400 p-2 w-full">
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">
                            Remove
                        </button>
                    </div>
                    @error("options.{$index}")
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>
        <button class="btn" type="submit">Create a Poll</button>
    </form>
</div>
