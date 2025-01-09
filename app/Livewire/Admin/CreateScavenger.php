<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Scavenger;
use Livewire\Attributes\Validate;

class CreateScavenger extends Component
{
    #[Validate('required')]
    public string $question = '';

    #[Validate('required')]
    public string $answer = '';

    #[Validate('required')]
    public string $verse = '';

    public function save()
    {
        $data = $this->validate();
        $counter = Scavenger::where('question', $this->question)
                        ->where('answer', $this->answer)
                        ->where('verse', $this->verse)->count();
        if($counter <= 0)
        {
            $rec = Scavenger::create($data);
        }  

        return redirect()->route('scavengers');
    }

    public function cancel()
    {
        return redirect()->route('scavengers');
    }

    public function render()
    {
        return view('livewire.admin.create-scavenger');
    }
}
