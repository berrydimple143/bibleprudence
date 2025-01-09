<?php

namespace App\Livewire\Admin;

use App\Models\Selection;
use Livewire\Component;
use Livewire\WithPagination;

class Choice extends Component
{
    use WithPagination;

    public string $showForm = '';

    public $search = null;

    public $sortOrder = null;

    public $asc = false;

    public $sortDir = 'desc';

    public Selection $choice;

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

    public function addChoice()
    {
        $this->showForm = 'add';
    }

    public function editChoice($id)
    {
        $this->choice = Selection::find($id);
        $this->showForm = 'edit';
    }

    public function deleteChoice($id)
    {
        $rec = Selection::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.choice', [
            'choices' => Selection::when(filled($this->search), function ($query) {
                $query->where('option', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'choice',
        ]);
    }
}
