<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Disclaimer extends Component
{
    public function mount()
    {
        ini_set('max_execution_time', 36000);
    }
    
    public function render()
    {
        return view('livewire.front.disclaimer')->layout('components.layouts.app', [
            'page' => 'disclaimer',
            'title' => 'Bible Prudence - Disclaimer',
        ]);
    }
}

