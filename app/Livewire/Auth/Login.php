<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth as ValidAuth;

class Login extends Component
{
    #[Validate('required|email|min:2|max:200')]
    public $email;

    #[Validate('required|min:2')]
    public $password;

    public function login()
    {
        $data = $this->validate();
        if (ValidAuth::attempt($data)) {
            return redirect()->route('secret');
        } else {
            $this->dispatch('error', 'Invalid email or password!');
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.start');
    }
}
