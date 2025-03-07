<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Bmath;

class MathItem extends Component
{
    public Bmath $math;
    public int $counter;
    public int $items;

    public function render()
    {
        return view('livewire.front.math-item');
    }
}
