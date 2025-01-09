<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Book;

class UpdateBook extends Component
{
    public Book $book;

    #[Validate('required|max:254')]
    public string $name = '';

    public function save()
    {
        $data = $this->validate();
        $rec = $this->book->update($data);

        return redirect()->route('books');
    }

    public function cancel()
    {
        return redirect()->route('books');
    }

    public function mount($book)
    {
        $this->name = $book->name;        
    }

    public function render()
    {
        return view('livewire.admin.update-book');
    }
}
