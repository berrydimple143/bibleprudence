<?php

namespace App\Livewire\Other;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User; 
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    #[Validate('required')]
    public string $first_name = '';

    #[Validate('required')]
    public string $last_name = '';

    #[Validate('required|email:rfc,dns')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    #[Validate('required')]
    public string $username = '';

    #[Validate('required')]
    public string $role = '';

    private function emptyFields()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->username = '';
        $this->role = '';
    }

    public function save()
    {
        $data = $this->validate();        
        $user = User::create($data);
        $user->assignRole($this->role);            
        $this->emptyFields();
        session()->flash('msg', 'User was created successfully.'); 
    }

    public function render()
    {
        $roles = Role::where('guard_name', 'web')->orderBy('name', 'asc')->get();
        return view('livewire.other.create-user', ['roles' => $roles])->layout('components.layouts.registration', [
            'page' => 'role',
            'title' => 'Bible Prudence Role Form',
            'keywords' => 'Bible Prudence Role',
            'description' => 'Role form',
            'author' => 'Virgil Rosalita',
            'application_name' => 'Bible Prudence',
            'generator' => 'Laravel Livewire 3.0',
            'robots' => 'index, follow',
        ]);
    }
}
