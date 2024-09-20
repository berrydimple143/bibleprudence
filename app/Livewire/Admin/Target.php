<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Target as ScavengerTarget;
use Livewire\WithPagination;

class Target extends Component
{
    use WithPagination;

    public string $showForm = '';

    public ScavengerTarget $target;

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
        $this->sortOrder = $column;                
    }

    public function addTarget()
    {
        $this->showForm = 'add';
    }

    public function editTarget($id)
    {
        $this->target = ScavengerTarget::find($id);
        $this->showForm = 'edit';
    }

    public function deleteTarget($id)
    {
        $rec = ScavengerTarget::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.target', [
            'targets' => ScavengerTarget::when(filled($this->search), function ($query) {
                $query->where('option', 'LIKE', '%'.$this->search.'%');   
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);                 
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'targets'
        ]);
    }
}
