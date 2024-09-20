<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\DownloadLimit;

class CreateLimit extends Component
{
    #[Validate('required')]
    public int $limit = 50;

    #[Validate('required')]
    public string $app = '';

    public function save()
    {
        $data = $this->validate();
        $record = DownloadLimit::create($data);

        return redirect()->route('download.limit');
    }

    public function cancel()
    {
        return redirect()->route('download.limit');
    }

    public function render()
    {
        return view('livewire.admin.create-limit');
    }
}
