<?php

namespace App\Livewire\Admin;

use App\Models\Bmath;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateMath extends Component
{
    #[Validate('required|unique:bmaths,question')]
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
        $record = Bmath::create($data);

        return redirect()->route('maths');
    }

    public function cancel()
    {
        return redirect()->route('maths');
    }

    public function render()
    {
        return view('livewire.admin.create-math');
    }
}
