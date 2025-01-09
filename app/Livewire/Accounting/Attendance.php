<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attendance as MemberAttendance;

class Attendance extends Component
{
    use WithPagination;
    public $search = null;
    public $sortOrder = null;
    public $asc = false;
    public $sortDir = 'desc';
    public string $showForm = '';
    public MemberAttendance $attendance;

    public function addAttendance()
    {
        $this->showForm = 'add';
    }

    public function editAttendance($id)
    {
        $this->attendance = MemberAttendance::find($id);
        $this->showForm = 'edit';
    }

    public function deleteAttendance($id)
    {
        $rec = MemberAttendance::find($id)->delete();
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
        $this->sortOrder = $column;
    }

    public function render()
    {
        return view('livewire.accounting.attendance', [
            'attendances' => MemberAttendance::when(filled($this->search), function ($query) {
                $query->where('men', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('ladies', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('young_people', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('children', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('date_attended', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.accounting', [
            'title' => 'Church Financial System - Attendance Page',
            'page' => 'attendance',
        ]);
    }
}
