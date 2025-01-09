<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DownloadLimit as DownLimit;

class DownloadLimit extends Component
{
    use WithPagination;

    public string $showForm = '';

    public $search = null;

    public DownLimit $dlimit;

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
        if($column == "topic") 
        {
            $this->sortOrder = 'topic.name';
        } else {
            $this->sortOrder = $column;
        }        
    }

    public function addDownloadLimit()
    {
        $this->showForm = 'add';
    }

    public function editDownloadLimit($id)
    {
        $this->dlimit = DownLimit::find($id);
        $this->showForm = 'edit';
    }

    public function deleteDownloadLimit($id)
    {
        $rec = DownLimit::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.download-limit', [
                'limits' => DownLimit::when(filled($this->search), function ($query) {
                    $query->where('limit', 'LIKE', '%'.$this->search.'%')
                          ->orWhere('app', 'LIKE', '%'.$this->search.'%')  
                          ->orWhere('items', 'LIKE', '%'.$this->search.'%');    
                })->when(filled($this->sortOrder), function ($query) {
                        $query->orderBy($this->sortOrder, $this->sortDir);          
                })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'download'
        ]);
    }
}

