<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Target;
use App\Models\Scavenger;

class CreateTarget extends Component
{
    #[Validate('required')]
    public $option = '';

    #[Validate('required')]
    public $scavenger_id;

    public function save()
    {
        $data = $this->validate();
        $record = Target::create($data);

        return redirect()->route('targets');
    }

    public function cancel()
    {
        return redirect()->route('targets');
    }

    public function render()
    {
        return view('livewire.admin.create-target', [
            'scavengers' => Scavenger::all(),
        ]);
    }
}
