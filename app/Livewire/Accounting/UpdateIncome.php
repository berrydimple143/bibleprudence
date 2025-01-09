<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Validate;

class UpdateIncome extends Component
{
    public Transaction $income;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $amount = '';

    #[Validate('required')]
    public string $currency = 'Php';

    #[Validate('required')]
    public string $date_issued = '';

    public string $description = '';

    public function save()
    {
        $data = $this->validate();
        $data['description'] = $this->description;
        $rec = $this->income->update($data);

        return redirect()->route('income');
    }

    public function cancel()
    {
        return redirect()->route('income');
    }

    public function mount($income)
    {
        $this->name = $income->name;
        $this->amount = $income->amount;
        $this->currency = $income->currency;
        $this->description = $income->description;
        $this->date_issued = formatCustomDate($income->date_issued, 'Y-m-d');        
    }

    public function render()
    {
        return view('livewire.accounting.update-income');
    }
}
