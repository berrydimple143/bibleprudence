<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact as ContactUser;

class Contact extends Component
{
    use WithPagination;

    public string $showForm = '';

    public $search = null;

    public ContactUser $contact;

    public $sortOrder = null;

    public $asc = false;

    public $sortDir = 'desc';

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

    public function addContact()
    {
        $this->showForm = 'add';
    }

    public function editContact($id)
    {
        $this->contact = ContactUser::find($id);
        $this->showForm = 'edit';
    }

    public function deleteContact($id)
    {
        $rec = ContactUser::find($id)->delete();
    }

    public function addReplied($id)
    {
        $c = ContactUser::find($id)->update(['replied' => 1]);
    }

    public function render()
    {
        return view('livewire.admin.contact', [
            'contacts' => ContactUser::when(filled($this->search), function ($query) {
                    $query->where('name', 'LIKE', '%'.$this->search.'%')
                          ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                          ->orWhere('message', 'LIKE', '%'.$this->search.'%');
                    })->when(filled($this->sortOrder), function ($query) {
                        $query->orderBy($this->sortOrder, $this->sortDir);  
                    })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'contact'
        ]);
    }
}
