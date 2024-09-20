<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Topic;

class CreateTopic extends Component
{

    #[Validate('required|max:254|unique:topics,name')]
    public string $name = '';

    public function save()
    {
        $data = $this->validate();
        $topic = Topic::create($data);

        return redirect()->route('topics');
    }

    public function cancel()
    {
        return redirect()->route('topics');
    }

    public function render()
    {
        return view('livewire.admin.create-topic');
    }
}
