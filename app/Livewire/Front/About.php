<?php

namespace App\Livewire\Front;

use Livewire\Component;

class About extends Component
{
    public function mount()
    {
        ini_set('max_execution_time', 36000);
    }

    public function render()
    {
        return view('livewire.front.about')->layout('components.layouts.app', [
            'page' => 'about',
            'title' => 'Bible Quiz - About Us',
        ]);
    }
}
