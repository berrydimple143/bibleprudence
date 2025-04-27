<?php

namespace App\Livewire\Other;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role as UserRole;

class Role extends Component
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $guard_name = 'web';

    public function save()
    {
        $role = UserRole::create(['name' => $this->name, 'guard_name' => $this->guard_name]);
        $this->name = '';
        session()->flash('msg', 'Role was created successfully.');
    }

    public function render()
    {
        return view('livewire.other.role')->layout('components.layouts.registration', [
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
