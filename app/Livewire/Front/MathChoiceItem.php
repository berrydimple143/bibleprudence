<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\MathOption;

class MathChoiceItem extends Component
{
    public MathOption $choice;

    public $question;  
    public $answer;
    public $verses;  
    public $items;      

    public function mount($answer)
    {
        $this->answer = $answer;
    }

    private function countSelected()
    {
        $chosen = (int)session('taken_math') + 1;
        session()->put('taken_math', $chosen);
    }

    private function addScore($total_math, $type)
    {
        $newScore = (int)session('mtscore') + 1;
        session()->put('mtscore', $newScore);
        if($type != "finish") {
            $msg = 'Correct and the verse is '.$this->verses. '. Your total score is "'.$newScore .'" out of '. $total_math.' items';
            $this->dispatch('correct', $msg); 
        }         
    }

    public function checkAnswer($selected)
    {
        $total_math = (int)session('total_math');    
        $taken = (int)session('taken_math');     

        if($taken == ($total_math - 1)) {
            if ($selected == $this->answer) {
                $this->addScore($total_math, 'finish');
            }            
            $totalScore = (int)session('mtscore');
            $scoreMsg = 'Your score is '.$totalScore.' out of '.$total_math.'.';
            $qstatus = 'passed';
            if($totalScore > ($total_math / 2)) {
                $msg = "Congratulations! You've passed the test. ".$scoreMsg;
            } else {
                $qstatus = 'failed';
                $msg = "Sorry! You've failed the test. ".$scoreMsg;
            }           
            $this->dispatch('result', $msg);             
        } else {
            $array_questions = session('mtquestions'); 
            if ($selected == $this->answer) {
                if(in_array($this->question, $array_questions)) {
                    $this->dispatch('wrong', 'You have already answered this question.'); 
                }  else {
                    $this->countSelected();
                    $this->addScore($total_math, 'scoring');   
                }
            } else {
                if(in_array($this->question, $array_questions)) {
                    $this->dispatch('wrong', 'You have already answered this question.');                 
                } else {
                    $this->countSelected();
                    $oldScore = (int)session('mtscore');
                    $errmsg = 'Ooops! Wrong. The answer is "'.$this->answer.'" in '.$this->verses.'. Current Score: '. $oldScore.'.';
                    $this->dispatch('wrong', $errmsg);
                }
            }         
            array_push($array_questions, $this->question);
            session()->put('mtquestions', $array_questions);            
        }        
    }

    public function render()
    {
        return view('livewire.front.math-choice-item');
    }
}
