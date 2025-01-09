<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Contact;

class CreateContact extends Component
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $message = '';

    public function save()
    {
        $data = $this->validate();
        $record = Contact::create($data);

        return redirect()->route('admin.contact');
    }

    public function cancel()
    {
        return redirect()->route('admin.contact');
    }

    public function render()
    {
        return view('livewire.admin.create-contact');
    }
}
