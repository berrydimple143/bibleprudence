<?php

namespace App\Livewire\Admin;

use App\Models\Book as BibleBook;
use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    use WithPagination;

    public $search = null;

    public $sortOrder = null;

    public $asc = false;

    public $sortDir = 'desc';

    public string $showForm = '';

    public BibleBook $book;

    public function addBook()
    {
        $this->showForm = 'add';
    }

    public function editBook($id)
    {
        $this->book = BibleBook::find($id);
        $this->showForm = 'edit';
    }

    public function deleteBook($id)
    {
        $rec = BibleBook::find($id)->delete();
    }

    public function sort($column)
    {
        $this->asc = !$this->asc;
        if($this->asc == true)
        {
            $this->sortDir = 'asc';
        } else {
            $this->sortDir = 'desc';
        }        
    }

    public function render()
    {
        return view('livewire.admin.book', [
            'books' => BibleBook::when(filled($this->search), function ($query) {
                $query->where('name', 'LIKE', '%'.$this->search.'%');                    
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'book',
        ]);
    }
}
