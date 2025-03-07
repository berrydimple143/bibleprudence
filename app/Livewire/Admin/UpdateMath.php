<?php

namespace App\Livewire\Admin;

use App\Models\Bmath;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateMath extends Component
{
    public Bmath $math;

    #[Validate('required')]
    public string $question = '';

    #[Validate('required')]
    public string $answer = '';

    #[Validate('required')]
    public string $verses = '';

    #[Validate('required')]
    public string $level = '';

    #[Validate('nullable')]
    public string $formula = '';

    public function save()
    {
        $data = $this->validate();
        $rec = $this->math->update($data);

        return redirect()->route('maths');
    }

    public function cancel()
    {
        return redirect()->route('maths');
    }

    public function mount($math)
    {
        $this->question = $math->question;
        $this->answer = $math->answer;
        $this->verses = $math->verses;
        $this->level = $math->level;
    }

    public function render()
    {
        return view('livewire.admin.update-math');
    }
}
