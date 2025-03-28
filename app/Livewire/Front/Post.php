<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Blog; 

class Post extends Component
{
    public Blog $post;
    public $slug = "";

    public function mount($id, $slug)
    {
        $this->post = Blog::find($id);
        $this->slug = $slug;
    }

    public function render()
    {
        $title = $this->post->title;
        $newBody = getNewBody($this->post);
        return view('livewire.front.post', ['newBody' => $newBody])->layout('components.layouts.app', [
            'page' => 'post',
            'title' => $title,
            'keywords' => getKeywordsFromSlug($this->slug, ','),
            'description' => 'Blog post for ' . $title,
            'author' => $this->post->author,
            'application_name' => 'Bible Prudence',
            'generator' => 'Laravel Livewire 3.0',
            'robots' => 'index, follow',
        ]);
    }
}
