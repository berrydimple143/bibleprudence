<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Topic;

class UpdateTopic extends Component
{

    public Topic $topic;

    #[Validate('required|max:254')]
    public string $name = '';

    public function save()
    {
        $data = $this->validate();
        $rec = $this->topic->update($data);

        return redirect()->route('topics');
    }

    public function cancel()
    {
        return redirect()->route('topics');
    }

    public function mount($topic)
    {
        $this->name = $topic->name;        
    }

    public function render()
    {
        return view('livewire.admin.update-topic');
    }
}
