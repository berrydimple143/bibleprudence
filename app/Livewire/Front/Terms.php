<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Terms extends Component
{
    public function mount()
    {
        ini_set('max_execution_time', 36000);
    }

    public function render()
    {
        return view('livewire.front.terms')->layout('components.layouts.app', [
            'page' => 'terms',
            'title' => 'Bible Prudence - Terms and Conditions',
        ]);
    }
}

