<?php

namespace App\Livewire\Admin;

use App\Models\Quiz as BibleQuiz;
use Livewire\Component;
use Livewire\WithPagination;

class Quiz extends Component
{
    use WithPagination;

    public $level = null;

    public $search = null;

    public $sortOrder = null;

    public $asc = false;

    public $sortDir = 'desc';

    public string $showForm = '';

    public BibleQuiz $quiz;

    public function addQuiz()
    {
        $this->showForm = 'add';
    }

    public function editQuiz($id)
    {
        $this->quiz = BibleQuiz::find($id);
        $this->showForm = 'edit';
    }

    public function deleteQuiz($id)
    {
        $rec = BibleQuiz::find($id)->delete();
    }

    public function sort($column)
    {
        $this->asc = !$this->asc;
        if($this->asc == true)
        {
            $this->sortDir = 'asc';
        } else {
            $this->sortDir = 'desc';
        }   
        if($column == "topic") 
        {
            $this->sortOrder = 'topic.name';
        } else {
            $this->sortOrder = $column;
        }        
    }

    public function render()
    {
        return view('livewire.admin.quiz', [
            'quizzes' => BibleQuiz::when(filled($this->level), function ($query) {
                $query->where('level', $this->level);
            })->when(filled($this->search), function ($query) {
                $query->where('level', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('question', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('answer', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('verse', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'quiz',
        ]);
    }
}
