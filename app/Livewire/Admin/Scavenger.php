<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Scavenger as AdminScavenger;

class Scavenger extends Component
{
    use WithPagination;

    public string $showForm = '';

    public AdminScavenger $scavenger;

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

    public function addScavenger()
    {
        $this->showForm = 'add';
    }

    public function editScavenger($id)
    {
        $this->scavenger = AdminScavenger::find($id);
        $this->showForm = 'edit';
    }

    public function deleteScavenger($id)
    {
        $rec = AdminScavenger::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.scavenger', [
            'scavengers' => AdminScavenger::when(filled($this->search), function ($query) {
                $query->where('question', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('answer', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('verse', 'LIKE', '%'.$this->search.'%');                      
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);                 
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'scavengers'
        ]);
    }
}
