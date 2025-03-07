<?php

namespace App\Livewire\Admin;

use App\Models\Bmath;
use Livewire\Component;
use Livewire\WithPagination;

class BibleMath extends Component
{
    use WithPagination;

    public $level = null;
    public $search = null;
    public $sortOrder = null;
    public $asc = false;
    public $sortDir = 'desc';
    public string $showForm = '';
    public Bmath $math;

    public function addMath()
    {
        $this->showForm = 'add';
    }

    public function editMath($id)
    {
        $this->math = Bmath::find($id);
        $this->showForm = 'edit';
    }

    public function deleteMath($id)
    {
        $rec = Bmath::find($id)->delete();
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
    }

    public function render()
    {
        return view('livewire.admin.bible-math', [
            'bmaths' => Bmath::when(filled($this->level), function ($query) {
                $query->where('level', $this->level);
            })->when(filled($this->search), function ($query) {
                $query->where('level', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('question', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('answer', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('verses', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('formula', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'maths',
        ]);
    }
}
