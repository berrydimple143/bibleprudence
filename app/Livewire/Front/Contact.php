<?php

namespace App\Livewire\Front;

use App\Models\Contact as ContactModel;
use Livewire\Attributes\Validate;
use Livewire\Component;
// use App\Mail\ContactForm;
// use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    #[Validate('required|min:2|max:200')]
    public string $name;

    #[Validate('required|email|unique:contacts|min:2|max:200')]
    public string $email;

    #[Validate('required|min:2|max:900')]
    public string $message;

    public function mount()
    {
        ini_set('max_execution_time', 36000);
    }

    public function send()
    {
        $data = $this->validate();
        $contact = ContactModel::create($data);
        $this->name = '';
        $this->email = '';
        $this->message = '';

        //Mail::to('virgilrosalita@gmail.com')->send(new ContactForm($contact));

        $this->dispatch('email', 'Email sent successfully!');
        return redirect()->route('site');
    }

    public function render()
    {
        return view('livewire.front.contact')->layout('components.layouts.app', [
            'page' => 'contact',
            'title' => 'Bible Quiz - Contact Us',
        ]);
    }
}
