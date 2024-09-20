<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Selection;
use App\Models\Quiz;

class CreateChoice extends Component
{
    #[Validate('required')]
    public $option = '';

    #[Validate('required')]
    public $quiz_id;

    public function save()
    {
        $data = $this->validate();
        $record = Selection::create($data);

        return redirect()->route('choices');
    }

    public function cancel()
    {
        return redirect()->route('choices');
    }

    public function render()
    {
        return view('livewire.admin.create-choice', [
            'quizzes' => Quiz::all(),
        ]);
    }
}
