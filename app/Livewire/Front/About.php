<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\DownloadLimit;

class About extends Component
{
    public function mount()
    {
        ini_set('max_execution_time', 36000);
    }

    public function render()
    {
	$qlimit = DownloadLimit::select('limit')->where('app', 'Bible Quiz')->first();
        return view('livewire.front.about', ['qlimit' => $qlimit])->layout('components.layouts.app', [
            'page' => 'about',
	    'title' => 'Bible Prudence - About Us',
        ]);
    }
}

