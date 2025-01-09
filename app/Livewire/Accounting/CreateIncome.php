<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateIncome extends Component
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

    public function save()
    {
        $data = $this->validate();
        $data['type'] = 'income';
        $data['description'] = $this->description;
        $data['user_id'] = Auth::id();
        $record = Transaction::create($data);

        return redirect()->route('income');
    }

    public function cancel()
    {
        return redirect()->route('income');
    }

    public function render()
    {
        return view('livewire.accounting.create-income');
    }
}
