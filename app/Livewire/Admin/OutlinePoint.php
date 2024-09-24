<?php

namespace App\Livewire\Admin;

use App\Models\Point;
use App\Models\Outline;
use Livewire\Component;
use Livewire\WithPagination;

class OutlinePoint extends Component
{
    use WithPagination;

    public $search = null;
    public $sortOrder = null;
    public $asc = false;
    public $sortDir = 'desc';
    public string $showForm = '';

    public Point $point;

    public function addPoint()
    {
        $totalOutline = Outline::all()->count();
        if($totalOutline > 0) {
            $this->showForm = 'add';
        } else {
            $this->dispatch('check-record', 'No Bible outline yet. Please make one!');
        }
    }

    public function editPoint($id)
    {
        $this->point = Point::find($id);
        $this->showForm = 'edit';
    }

    public function deletePoint($id)
    {
        $rec = Point::find($id)->delete();
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
        return view('livewire.admin.outline-point', [
            'points' => Point::when(filled($this->search), function ($query) {
                $query->where('main', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('verse', 'LIKE', '%'.$this->search.'%');                    
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'points',
        ]);
    }
}
