<?php

namespace App\Livewire\Admin;

use App\Models\MathOption;
use App\Models\Bmath;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateMathOption extends Component
{
    #[Validate('required')]
    public $option = '';

    #[Validate('required')]
    public $bmath_id;

    public function save()
    {
        $data = $this->validate();
        $record = MathOption::create($data);
        return redirect()->route('math.choices');
    }

    public function cancel()
    {
        return redirect()->route('math.choices');
    }

    public function render()
    {
        return view('livewire.admin.create-math-option', [
            'maths' => Bmath::all(),
        ]);
    }
}
