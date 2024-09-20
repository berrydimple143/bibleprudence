<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Scavenger;
use Livewire\Attributes\Validate;

class UpdateScavenger extends Component
{
    public Scavenger $scavenger;

    #[Validate('required')]
    public string $question = '';

    #[Validate('required')]
    public string $answer = '';

    #[Validate('required')]
    public string $verse = '';

    public function save()
    {
        $data = $this->validate();
        $rec = $this->scavenger->update($data);

        return redirect()->route('scavengers');
    }

    public function cancel()
    {
        return redirect()->route('scavengers');
    }

    public function mount($scavenger)
    {
        $this->question = $scavenger->question;
        $this->answer = $scavenger->answer;
        $this->verse = $scavenger->verse;        
    }

    public function render()
    {
        return view('livewire.admin.update-scavenger');
    }
}
