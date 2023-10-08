<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];

    protected $rules = [
        'title' => 'required|min:3',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    protected $messages = [
        'title.required' => 'The title field is required.',
        'title.min' => 'The title must be at least 3 characters.',
        'options.required' => 'The options field is required.',
        'options.array' => 'The options must be an array.',
        'options.min' => 'The options must be at least 1 item.',
        'options.max' => 'The options may not have more than 10 items.',
        'options.*.required' => 'The option field is required.',
        'options.*.min' => 'The option must be at least 1 character.',
        'options.*.max' => 'The option may not be greater than 255 characters.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $this->validate();

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
                collect($this->options)->map(fn($option) => ['name' => $option])
                    ->all()
            );

        $this->reset(['title', 'options']);

        $this->dispatch('pollCreated');
    }

    public function render()
    {
        return view('livewire.create-poll');
    }
}