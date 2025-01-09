<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\DownloadLimit;

class UpdateLimit extends Component
{
    public DownloadLimit $dlimit;

    #[Validate('required')]
    public int $limit = 50;

    #[Validate('required')]
    public string $app = '';

    #[Validate('nullable')]
    public int $items = 50;

    public function save()
    {
        $data = $this->validate();
        $rec = $this->dlimit->update($data);

        return redirect()->route('download.limit');
    }

    public function cancel()
    {
        return redirect()->route('download.limit');
    }

    public function mount($dlimit)
    {
        $this->limit = $dlimit->limit;    
        $this->items = $dlimit->items;  
        $this->app = $dlimit->app;  
    }

    public function render()
    {
        return view('livewire.admin.update-limit');
    }
}

