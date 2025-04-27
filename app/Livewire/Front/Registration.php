<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Blog; 
use App\Models\User; 
use Livewire\Attributes\Validate;

class Registration extends Component
{
    public $pid = '';

    #[Validate('required')]
    public string $first_name = '';

    #[Validate('required')]
    public string $last_name = '';

    #[Validate('required|email:rfc,dns')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function mount()
    {
        $this->pid = session('pid');
    }

    public function save()
    {
        $data = $this->validate();
        $data['username'] = $data['first_name'] . (string)rand();
        $user = User::create($data);
        $user->assignRole('commentator');
        session()->flash('msg', 'You can now login to submit your comment.');
        $this->redirectRoute('login', ['pid' => $this->pid]);
    }

    public function render()
    {        
        $post = Blog::find($this->pid);
        return view('livewire.front.registration', ['post' => $post])->layout('components.layouts.registration', [
            'page' => 'register',
            'title' => 'Bible Prudence Registration Form',
            'keywords' => 'Bible Prudence Registration',
            'description' => 'Registration form',
            'author' => 'Virgil Rosalita',
            'application_name' => 'Bible Prudence',
            'generator' => 'Laravel Livewire 3.0',
            'robots' => 'index, follow',
        ]);
    }
}
