<?php

namespace App\Livewire\Admin;

use App\Models\Point;
use App\Models\Outline;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdatePoint extends Component
{
    public Point $point;

    #[Validate('required')]
    public string $main = '';

    #[Validate('required')]
    public string $verse = '';

    #[Validate('required')]
    public $outline_id;

    public function save()
    {
        $data = $this->validate();
        $rec = $this->point->update($data);

        return redirect()->route('outline.points');
    }

    public function cancel()
    {
        return redirect()->route('outline.points');
    }

    public function mount($point)
    {
        $this->main = $point->main;
        $this->verse = $point->verse;
        $this->outline_id = $point->outline_id;
    }

    public function render()
    {
        return view('livewire.admin.update-point', [
            'outlines' => Outline::all(),
        ]);
    }
}
