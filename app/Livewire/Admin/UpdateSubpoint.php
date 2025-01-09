<?php

namespace App\Livewire\Admin;

use App\Models\Subpoint;
use App\Models\Point;
use App\Models\Outline;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateSubpoint extends Component
{
    public $points = null;
    public Subpoint $subpoint;

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
        $rec = $this->subpoint->update([
            'sub' => $data['sub'],
            'verse' => $data['verse'],
            'body' => $data['body'],
            'point_id' => $data['point_id'],
        ]);

        return redirect()->route('outline.subpoints');
    }

    public function cancel()
    {
        return redirect()->route('outline.subpoints');
    }

    public function changePoint()
    {
        $this->points = Point::where('outline_id', $this->outline_id)->get();
    }

    public function mount($subpoint)
    {
        $this->sub = $subpoint->sub;
        $this->verse = $subpoint->verse;
        $this->body = $subpoint->body;
        $this->point_id = $subpoint->point_id;
        $this->outline_id = $subpoint->point->outline_id;
        $this->points = Point::where('outline_id', $this->outline_id)->get();
    }

    public function render()
    {
        return view('livewire.admin.update-subpoint', [
            'outlines' => Outline::all(),
        ]);
    }
}
