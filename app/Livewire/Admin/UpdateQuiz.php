<?php

namespace App\Livewire\Admin;

use App\Models\Quiz;
use App\Models\Topic;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateQuiz extends Component
{
    public Quiz $quiz;

    #[Validate('required')]
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
        $rec = $this->quiz->update($data);

        return redirect()->route('quizzes');
    }

    public function cancel()
    {
        return redirect()->route('quizzes');
    }

    public function mount($quiz)
    {
        $this->question = $quiz->question;
        $this->answer = $quiz->answer;
        $this->verse = $quiz->verse;
        $this->level = $quiz->level;
        $this->topic_id = $quiz->topic_id;
    }

    public function render()
    {
        return view('livewire.admin.update-quiz', [
            'topics' => Topic::all(),
        ]);
    }
}
