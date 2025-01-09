<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Contact;

class UpdateContact extends Component
{
    public Contact $contact;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $message = '';

    public function save()
    {
        $data = $this->validate();
        $rec = $this->contact->update($data);

        return redirect()->route('admin.contact');
    }

    public function cancel()
    {
        return redirect()->route('admin.contact');
    }

    public function mount($contact)
    {
        $this->name = $contact->name;    
        $this->email = $contact->email; 
        $this->message = $contact->message;     
    }

    public function render()
    {
        return view('livewire.admin.update-contact');
    }
}
