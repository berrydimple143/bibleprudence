<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class Income extends Component
{
    use WithPagination;
    public $search = null;
    public $sortOrder = null;
    public $asc = false;
    public $sortDir = 'desc';
    public string $showForm = '';
    public Transaction $income;

    public function addIncome()
    {
        $this->showForm = 'add';
    }

    public function editIncome($id)
    {
        $this->income = Transaction::find($id);
        $this->showForm = 'edit';
    }

    public function deleteIncome($id)
    {
        $rec = Transaction::find($id)->delete();
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
        return view('livewire.accounting.income', [
            'incomes' => Transaction::where('type', 'income')->when(filled($this->search), function ($query) {
                $query->where('name', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('amount', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('description', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('currency', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('date_issued', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.accounting', [
            'title' => 'Church Financial System - Income Page',
            'page' => 'income',
        ]);
    }
}
