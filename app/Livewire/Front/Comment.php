<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\BlogComment;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
    public Blog $post;
    public string $body = '';

    public function reply()
    {
        if (Auth::check()) {
            dd('Logged in.');
        } else {
            dd('Not logged in.');
        }
    }

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.front.comment', [
            'comments' => BlogComment::where('blog_id', $this->post->id)->orderBy('created_at', 'desc')->get()
        ]);
    }
}
