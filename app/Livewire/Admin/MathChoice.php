<?php

namespace App\Livewire\Admin;

use App\Models\MathOption;
use Livewire\Component;
use Livewire\WithPagination;

class MathChoice extends Component
{
    use WithPagination;

    public string $showForm = '';

    public $search = null;

    public $sortOrder = null;

    public $asc = false;

    public $sortDir = 'desc';

    public MathOption $option;

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

    public function addOption()
    {
        $this->showForm = 'add';
    }

    public function editOption($id)
    {
        $this->option = MathOption::find($id);
        $this->showForm = 'edit';
    }

    public function deleteOption($id)
    {
        $rec = MathOption::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.math-choice', [
            'choices' => MathOption::when(filled($this->search), function ($query) {
                $query->where('option', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'math-choices',
        ]);
    }


}
