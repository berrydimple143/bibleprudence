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

    private function countSelected()
    {
        $chosen = (int)session('taken_scavenger') + 1;
        session()->put('taken_scavenger', $chosen);
    }

    private function addScore($type)
    {
        $newScore = (int)session('scscore') + 1;
        session()->put('scscore', $newScore);
        if($type != "finish") {
            $msg = 'You are correct and your score is "'.$newScore .'"';            
            $this->dispatch('correct', $msg); 
        }         
    }

    public function checkAnswer($selected)
    {        
        $total_scavenger = (int)session('total_scavenger');    
        $taken = (int)session('taken_scavenger');   

        if($taken == ($total_scavenger - 1)) {
            if ($selected == $this->answer) {
                $this->addScore('finish');
            }            
            $totalScore = (int)session('scscore');
            $scoreMsg = 'Your score is '.$totalScore.' out of '.$total_scavenger.'.';
            $qstatus = 'passed';
            if($totalScore > ($total_scavenger / 2)) {
                $msg = "Congratulations! You've passed the scavenger test. ".$scoreMsg;
            } else {
                $qstatus = 'failed';
                $msg = "Sorry! You've failed the scavenger test. ".$scoreMsg;
            }           
            $this->dispatch('result', $msg); 
        } else {
            $array_questions = session('scquestions'); 
            $fullText = $this->question .' in '.$this->verse;

            if ($selected == $this->answer) {
                if(in_array($fullText, $array_questions)) {
                    $this->dispatch('wrong', 'You have already answered this question.'); 
                }  else {
                    $this->countSelected();
                    $this->addScore('scoring');   
                }
            } else {
                if(in_array($fullText, $array_questions)) {
                    $this->dispatch('wrong', 'You have already answered this question.');                 
                } else {
                    $this->countSelected();
                    $oldScore = (int)session('scscore');
                    $errmsg = 'Ooops! Wrong. The answer is "'.$this->answer.'". Score: '. $oldScore.'.';
                    $this->dispatch('wrong', $errmsg);
                }
            }
            
            array_push($array_questions, $fullText);
            session()->put('scquestions', $array_questions);
        }       
    }

    public function render()
    {
        return view('livewire.front.target-item');
    }
}

