<?php

namespace App\Livewire\Admin;

use App\Models\Quiz;
use App\Models\Topic;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateQuiz extends Component
{
    #[Validate('required|unique:quizzes,question')]
    public string $question = '';

    #[Validate('required')]
    public string $answer = '';

    #[Validate('required')]
    public string $verse = '';

    #[Validate('required')]
    public string $level = '';

    #[Validate('required')]
    public $topic_id;

    public function save()
    {
        $data = $this->validate();
        $record = Quiz::create($data);

        return redirect()->route('quizzes');
    }

    public function cancel()
    {
        return redirect()->route('quizzes');
    }

    public function render()
    {
        return view('livewire.admin.create-quiz', [
            'topics' => Topic::all(),
        ]);
    }
}
