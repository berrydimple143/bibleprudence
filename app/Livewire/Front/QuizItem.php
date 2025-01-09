<?php

namespace App\Livewire\Front;

use App\Models\Quiz;
use Livewire\Attributes\On;
use Livewire\Component;

class QuizItem extends Component
{
    public Quiz $quiz;
    public bool $commenting = false;
    public int $counter;
    public int $items;

    #[On('comment-off')]
    public function commentOff()
    {
        $this->commenting = false;
    }

    public function render()
    {
        return view('livewire.front.quiz-item');
    }
}
