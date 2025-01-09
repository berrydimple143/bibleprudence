<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateExpense extends Component
{
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
        $data['type'] = 'expense';
        $data['description'] = $this->description;
        $data['given_to'] = $this->given_to;
        $data['user_id'] = Auth::id();
        $record = Transaction::create($data);

        return redirect()->route('expenses');
    }

    public function cancel()
    {
        return redirect()->route('expenses');
    }

    public function render()
    {
        return view('livewire.accounting.create-expense');
    }
}
