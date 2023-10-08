<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class RemoveAllPolls extends Component
{
    public function removeAllPolls()
    {
        Poll::destroy(Poll::all()->pluck('id'));

        $this->dispatch('pollsRemoved');
    }
    public function render()
    {
        return view('livewire.remove-all-polls');
    }
}
