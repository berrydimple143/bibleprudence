<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\HelperController;
use App\Models\Blog as BlogPost; 
use Livewire\Attributes\On;

class Blog extends Component
{
    use WithPagination;

    public $search = null;
    public $count = 0;

    #[On('search-blog')]
    public function searchBlog($search)
    {
        $this->search = $search;
    }

    public function mount()
    {
        $this->count = BlogPost::all()->count();
    }

    public function render()
    {
        $seo = HelperController::getSeo('Blog');        
        return view('livewire.front.blog', [
            'blogs' => BlogPost::when(filled($this->search), function ($query) {
                $query->where('topic', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('title', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('author', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('body', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('image', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('video', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('audio', 'LIKE', '%'.$this->search.'%');           
            })->where('status', true)->orderBy('date_posted', 'desc')->paginate(10),
        ])->layout('components.layouts.app', [
            'page' => 'blog',
            'title' => $seo->title,
            'keywords' => $seo->keywords,
            'description' => $seo->description,
            'author' => $seo->author,
            'application_name' => $seo->application_name,
            'generator' => $seo->generator,
            'robots' => $seo->robots,
        ]);
    }
}
