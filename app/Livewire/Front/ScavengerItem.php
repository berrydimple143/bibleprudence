<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Scavenger;

class ScavengerItem extends Component
{
    public Scavenger $scavenger;
    public int $counter;
    public int $score;

    public function render()
    {
        return view('livewire.front.scavenger-item');
    }
}
