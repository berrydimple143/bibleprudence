<?php

namespace App\Livewire\Front;

use App\Models\Selection;
use Livewire\Component;

class ChoiceItem extends Component
{
    public Selection $choice;

    public $answer;

    public $question;

    public int $score;

    public function mount($answer)
    {
        $this->answer = $answer;
    }

    public function checkAnswer($selected)
    {       
        $array_questions = session('questions');          
        if ($selected == $this->answer) {
            if(in_array($this->question, $array_questions)) {
                $this->dispatch('wrong', 'You have already answered this question.'); 
            }  else {
                $sc = (int)session('score');
                $newScore = $sc + 1;
                session()->put('score', $newScore);
                $msg = 'You are correct and your score is "'.$newScore .'"';
                $this->dispatch('correct', $msg);               
            }
        } else {
            if(in_array($this->question, $array_questions)) {
                $this->dispatch('wrong', 'You have already answered this question.');                 
            } else {
                $this->dispatch('wrong', 'Ooops! You are wrong.');
            }
        }
        //$array_questions[] = $this->question;
        array_push($array_questions, $this->question);
        session()->put('questions', $array_questions);
    }

    public function render()
    {
        return view('livewire.front.choice-item');
    }
}
