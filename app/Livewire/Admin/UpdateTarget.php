<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Target;
use App\Models\Scavenger;
use Livewire\Attributes\Validate;

class UpdateTarget extends Component
{
    public Target $target;

    #[Validate('required')]
    public string $option = '';

    #[Validate('required')]
    public $scavenger_id;

    public function save()
    {
        $data = $this->validate();
        $rec = $this->target->update($data);

        return redirect()->route('targets');
    }

    public function cancel()
    {
        return redirect()->route('targets');
    }

    public function mount($target)
    {
        $this->option = $target->option;     
        $this->scavenger_id = $target->scavenger_id;
    }

    public function render()
    {
        return view('livewire.admin.update-target', [
            'scavengers' => Scavenger::all(),
        ]);
    }
}
