<?php

namespace App\Livewire\Front;

use App\Models\Selection;
use Livewire\Component;

class ChoiceItem extends Component
{
    public Selection $choice;

    public $question;  
    public $answer;
    public $verse;  
    public $items;      

    public function mount($answer)
    {
        $this->answer = $answer;
    }

    private function countSelected()
    {
        $chosen = (int)session('taken') + 1;
        session()->put('taken', $chosen);
    }

    private function addScore($total_quiz, $type)
    {
        $newScore = (int)session('score') + 1;
        session()->put('score', $newScore);
        if($type != "finish") {
            $msg = 'Correct and the verse is '.$this->verse. '. Your total score is "'.$newScore .'" out of '. $total_quiz.' items';
            $this->dispatch('correct', $msg); 
        }         
    }    

    public function checkAnswer($selected)
    {                   
        $this->countSelected();
        $total_quiz = (int)session('total_quiz');    
        $taken = (int)session('taken');     

        if($taken == $total_quiz) {
            if ($selected == $this->answer) {
                $this->addScore($total_quiz, 'finish');
            }            
            $totalScore = (int)session('score');
            $scoreMsg = 'Your score is '.$totalScore.' out of '.$total_quiz.'.';
            $qstatus = 'passed';
            if($totalScore > ($total_quiz / 2)) {
                $msg = "Congratulations! You've passed the test. ".$scoreMsg;
            } else {
                $qstatus = 'failed';
                $msg = "Sorry! You've failed the test. ".$scoreMsg;
            }           
            $this->dispatch('result', $msg); 
        } else {                                  
            $array_questions = session('questions'); 
            if ($selected == $this->answer) {
                if(in_array($this->question, $array_questions)) {
                    $this->dispatch('wrong', 'You have already answered this question.'); 
                }  else {
                    $this->addScore($total_quiz, 'scoring');   
                }
            } else {
                if(in_array($this->question, $array_questions)) {
                    $this->dispatch('wrong', 'You have already answered this question.');                 
                } else {
                    $this->dispatch('wrong', 'Ooops! You are wrong.');
                }
            }
            
            array_push($array_questions, $this->question);
            session()->put('questions', $array_questions);
        }
    }

    public function render()
    {
        return view('livewire.front.choice-item');
    }
}
