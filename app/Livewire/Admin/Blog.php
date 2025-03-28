<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog as BibleBlog;

class Blog extends Component
{
    use WithPagination;

    public BibleBlog $blog;
    public $search = null;
    public $sortOrder = null;
    public $asc = false;
    public $sortDir = 'desc';
    public string $showForm = '';    

    public function addBlog()
    {
        $this->showForm = 'add';
    }

    public function editBlog($id)
    {
        $this->blog = BibleBlog::find($id);
        $this->showForm = 'edit';
    }

    public function deleteBlog($id)
    {
        $rec = BibleBlog::find($id)->delete();
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
        $this->sortOrder = $column;                
    }

    public function render()
    {
        return view('livewire.admin.blog', [
            'blogs' => BibleBlog::when(filled($this->search), function ($query) {
                $query->where('topic', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('title', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('author', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('image', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('video', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('audio', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('body', 'LIKE', '%'.$this->search.'%');
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'blog',
        ]);
    }
}
