<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Comment as QuizComment;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;

    public string $showForm = '';

    public QuizComment $comment;

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

    public function addComment()
    {
        $this->showForm = 'add';
    }

    public function editComment($id)
    {
        $this->comment = QuizComment::find($id);
        $this->showForm = 'edit';
    }    

    public function changeStatus($id, $stat)
    {
        if($stat == 1) { $stat = 0; } else { $stat = 1; }
        $c = QuizComment::find($id)->update(['status' => $stat]);
    }

    public function deleteComment($id)
    {
        $rec = QuizComment::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.comment', [
            'comments' => QuizComment::when(filled($this->search), function ($query) {
                $query->where('author', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('message', 'LIKE', '%'.$this->search.'%');     
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);          
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'comment'
        ]);
    }
}
