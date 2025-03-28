<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Blog;

class BlogItem extends Component
{
    public Blog $blog;

    public function render()
    {
        return view('livewire.front.blog-item');
    }
}
