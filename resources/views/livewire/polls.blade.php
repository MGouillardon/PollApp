<div>
    @forelse ($polls as $poll)
        <div class="mb-4">
            <h3 class="mb-4 text-xl">
                {{ $poll->title }}
                @foreach ($poll->options as $option)
                    <div class="mb-2">
                        <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
                        {{ $option->name }} ({{ $option->votes->count() }})
                    </div>
                @endforeach
            </h3>
        </div>
    @empty
        <div class="text-gray-500">
            No polls available
        </div>
    @endforelse
</div>