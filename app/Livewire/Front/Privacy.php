<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Privacy extends Component
{
    public function mount()
    {
        ini_set('max_execution_time', 36000);
    }

    public function render()
    {
        return view('livewire.front.privacy')->layout('components.layouts.app', [
            'page' => 'privacy',
            'title' => 'Bible Quiz - Privacy Policy',
        ]);
    }
}
