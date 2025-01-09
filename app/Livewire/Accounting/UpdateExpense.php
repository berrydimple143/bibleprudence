<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Validate;

class UpdateExpense extends Component
{
    public Transaction $expense;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $amount = '';

    #[Validate('required')]
    public string $currency = 'Php';

    #[Validate('required')]
    public string $date_issued = '';

    public string $description = '';
    public string $given_to = '';

    public function save()
    {
        $data = $this->validate();
        $data['description'] = $this->description;
        $data['given_to'] = $this->given_to;
        $rec = $this->expense->update($data);

        return redirect()->route('expenses');
    }

    public function cancel()
    {
        return redirect()->route('expenses');
    }

    public function mount($expense)
    {
        $this->name = $expense->name;
        $this->amount = $expense->amount;
        $this->currency = $expense->currency;
        $this->description = $expense->description;
        $this->given_to = $expense->given_to;
        $this->date_issued = formatCustomDate($expense->date_issued, 'Y-m-d');        
    }

    public function render()
    {
        return view('livewire.accounting.update-expense');
    }
}
