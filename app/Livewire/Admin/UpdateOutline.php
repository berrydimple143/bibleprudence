<?php

namespace App\Livewire\Admin;

use App\Models\Outline;
use App\Models\Topic;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateOutline extends Component
{
    public Outline $outline;

    #[Validate('required')]
    public string $text = '';

    #[Validate('required')]
    public string $support_text = '';

    #[Validate('required')]
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
        $rec = $this->outline->update($data);

        return redirect()->route('outlines');
    }

    public function cancel()
    {
        return redirect()->route('outlines');
    }

    public function mount($outline)
    {
        $this->text = $outline->text;
        $this->support_text = $outline->support_text;
        $this->theme = $outline->theme;
        $this->introduction = $outline->introduction;
        $this->keyword = $outline->keyword;
        $this->proposition = $outline->proposition;
        $this->conclusion = $outline->conclusion;
        $this->topic_id = $outline->topic_id;
    }

    public function render()
    {
        return view('livewire.admin.update-outline', [
            'topics' => Topic::all(),
        ]);
    }
}
