<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Target;

class TargetItem extends Component
{
    public Target $target;

    public $answer;
    public $question;
    public $verse;

    public int $score;

    public function mount($answer)
    {
        $this->answer = $answer;
    }

    public function checkAnswer($selected)
    {
        $array_questions = session('scquestions');
        $fullText = $this->question .' in '.$this->verse; 

        if ($selected == $this->answer) {
            if(in_array($fullText, $array_questions)) {                 
                $this->dispatch('wrong', 'You have already answered this question.'); 
            } else {
                $sc = (int)session('scscore');
                $newScore = $sc + 1;
                session()->put('scscore', $newScore);
                $msg = 'You are correct and your score is "'.$newScore .'"';
                $this->dispatch('correct', $msg);  
            }
        } else {
            if(in_array($fullText, $array_questions)) {
                $this->dispatch('wrong', 'You have already answered this question.');                
            } else {
                $this->dispatch('wrong', 'Ooops! You are wrong.');
            }
        }
           
        array_push($array_questions, $fullText);
        session()->put('scquestions', $array_questions);
    }

    public function render()
    {
        return view('livewire.front.target-item');
    }
}
