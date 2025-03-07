<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\MathOption;
use App\Models\Bmath;
use Livewire\Attributes\Validate;

class UpdateMathOption extends Component
{
    public MathOption $choise;

    #[Validate('required')]
    public $option;

    #[Validate('required')]
    public $bmath_id;

    public $option_id;

    public function save()
    {
        $data = $this->validate();        
        $rec = MathOption::find($this->option_id)->update($data);

        return redirect()->route('math.choices');
    }

    public function cancel()
    {
        return redirect()->route('math.choices');
    }

    public function mount($option)
    {
        $this->option = $option->option;     
        $this->bmath_id = $option->bmath_id;
        $this->option_id = $option->id;
    }

    public function render()
    {
        return view('livewire.admin.update-math-option', [
            'maths' => Bmath::all(),
        ]);
    }
}
