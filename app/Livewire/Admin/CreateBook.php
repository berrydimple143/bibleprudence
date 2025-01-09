<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Book;

class CreateBook extends Component
{
    #[Validate('required')]
    public $name = '';

    public function save()
    {
        $data = $this->validate();
        $record = Book::create($data);

        return redirect()->route('books');
    }

    public function cancel()
    {
        return redirect()->route('books');
    }

    public function render()
    {
        return view('livewire.admin.create-book');
    }
}
