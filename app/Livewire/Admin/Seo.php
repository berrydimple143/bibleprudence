<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Seo as AdminSeo;

class Seo extends Component
{
    use WithPagination;

    public string $showForm = '';

    public AdminSeo $seo;

    public $search = null;

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

    public function addSeo()
    {
        $this->showForm = 'add';
    }

    public function editSeo($id)
    {
        $this->seo = AdminSeo::find($id);
        $this->showForm = 'edit';
    }

    public function deleteSeo($id)
    {
        $rec = AdminSeo::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.seo', [
            'seos' => AdminSeo::when(filled($this->search), function ($query) {
                $query->where('page', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('title', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('description', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('url', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('robots', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('author', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('keywords', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('application_name', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('generator', 'LIKE', '%'.$this->search.'%')
                      ->orWhere('image', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);                 
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'seo'
        ]);
    }
}
