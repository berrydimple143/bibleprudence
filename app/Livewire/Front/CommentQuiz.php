<?php

namespace App\Livewire\Front;

use App\Models\Quiz;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommentQuiz extends Component
{
    public Quiz $quiz;

    #[Validate('required|min:2|max:200')]
    public string $author = '';

    #[Validate('required|min:2')]
    public string $message = '';

    public function save()
    {
        $data = $this->validate();
        $this->quiz->comments()->create($data);
        // $this->author = '';
        $this->message = '';
        $this->dispatch('success', 'success');
    }

    public function commentOff()
    {
        $this->dispatch('comment-off');
    }

    public function render()
    {
        return view('livewire.front.comment-quiz');
    }
}
