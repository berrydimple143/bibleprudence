<?php

namespace App\Livewire\Front;

use Livewire\Component;

class BlogMenu extends Component
{
    public $search = null;

    public function searchBlog()
    {
        $this->dispatch('search-blog', search: $this->search);
    }

    public function render()
    {
        return view('livewire.front.blog-menu');
    }
}
