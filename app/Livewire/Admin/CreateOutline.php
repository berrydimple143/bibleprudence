<?php

namespace App\Livewire\Admin;

use App\Models\Outline;
use App\Models\Topic;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateOutline extends Component
{
    #[Validate('required')]
    public string $text = '';

    #[Validate('required')]
    public string $support_text = '';

    #[Validate('required|unique:outlines,theme')]
    public string $theme = '';

    #[Validate('required')]
    public string $introduction = '';

    #[Validate('required')]
    public string $keyword = '';

    #[Validate('required')]
    public string $proposition = '';

    #[Validate('required')]
    public string $conclusion = '';

    #[Validate('required')]
    public $topic_id = '';

    public function save()
    {
        $data = $this->validate();
        $record = Outline::create($data);

        return redirect()->route('outlines');
    }

    public function cancel()
    {
        return redirect()->route('outlines');
    }

    public function render()
    {
        return view('livewire.admin.create-outline', [
            'topics' => Topic::all(),
        ]);
    }
}
