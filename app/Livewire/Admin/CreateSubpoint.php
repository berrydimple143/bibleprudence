<?php

namespace App\Livewire\Admin;

use App\Models\Subpoint;
use App\Models\Point;
use App\Models\Outline;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateSubpoint extends Component
{
    public $points = null;

    #[Validate('required')]
    public string $sub = '';

    #[Validate('required')]
    public string $verse = '';

    #[Validate('required')]
    public string $body = '';

    #[Validate('required')]
    public string $outline_id = '';

    #[Validate('required')]
    public $point_id;

    public function save()
    {
        $data = $this->validate();
        $record = Subpoint::create([
                    'sub' => $data['sub'],
                    'verse' => $data['verse'],
                    'body' => $data['body'],
                    'point_id' => $data['point_id'],
                ]);

        return redirect()->route('outline.subpoints');
    }

    public function changePoint()
    {
        $this->points = Point::where('outline_id', $this->outline_id)->get();
    }

    public function cancel()
    {
        return redirect()->route('outline.subpoints');
    }
    
    public function render()
    {
        return view('livewire.admin.create-subpoint', [
            'outlines' => Outline::all(),
        ]);
    }
}
