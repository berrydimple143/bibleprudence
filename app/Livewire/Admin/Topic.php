<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Topic as QuizTopic;
use Livewire\WithPagination;

class Topic extends Component
{
    use WithPagination;

    public string $showForm = '';

    public QuizTopic $topic;

    public $search = null;

    public $sortOrder = null;

    public $asc = false;

    public $sortDir = 'desc';

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

    public function addTopic()
    {
        $this->showForm = 'add';
    }

    public function editTopic($id)
    {
        $this->topic = QuizTopic::find($id);
        $this->showForm = 'edit';
    }

    public function deleteTopic($id)
    {
        $rec = QuizTopic::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.topic', [
            'topics' => QuizTopic::when(filled($this->search), function ($query) {
                $query->where('name', 'LIKE', '%'.$this->search.'%');   
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);                 
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'topic'
        ]);
    }
}
