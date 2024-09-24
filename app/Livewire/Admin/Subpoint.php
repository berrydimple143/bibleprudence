<?php

namespace App\Livewire\Admin;

use App\Models\Subpoint as AdminSubpoint;
use App\Models\Point;
use Livewire\Component;
use Livewire\WithPagination;

class Subpoint extends Component
{
    use WithPagination;

    public $search = null;
    public $sortOrder = null;
    public $asc = false;
    public $sortDir = 'desc';
    public string $showForm = '';

    public AdminSubpoint $subpoint;

    public function addSubpoint()
    {
        $totalPoint = Point::all()->count();
        if($totalPoint > 0) {
            $this->showForm = 'add';
        } else {
            $this->dispatch('check-record', 'No outline points yet. Please make one!');
        }
    }

    public function editSubpoint($id)
    {
        $this->point = AdminSubpoint::find($id);
        $this->showForm = 'edit';
    }

    public function deleteSubpoint($id)
    {
        $rec = AdminSubpoint::find($id)->delete();
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
        return view('livewire.admin.subpoint', [
            'subpoints' => AdminSubpoint::when(filled($this->search), function ($query) {
                $query->where('sub', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('verse', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('body', 'LIKE', '%'.$this->search.'%');                    
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'subpoints',
        ]);
    }
}
