<?php

namespace App\Livewire\Admin;

use App\Models\Subpoint;
use App\Models\Point;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateSubpoint extends Component
{
    #[Validate('required')]
    public string $main = '';

    #[Validate('required')]
    public string $verse = '';

    #[Validate('required')]
    public $outline_id;

    public function save()
    {
        $data = $this->validate();
        $record = Point::create($data);

        return redirect()->route('outline.points');
    }

    public function cancel()
    {
        return redirect()->route('outline.points');
    }
    
    public function render()
    {
        return view('livewire.admin.create-subpoint');
    }
}
