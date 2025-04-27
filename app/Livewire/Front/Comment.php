<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\BlogComment;
use App\Models\Blog;
use App\Models\User;
use App\Models\Like;
use Livewire\Attributes\Validate;

class Comment extends Component
{
    public Blog $post;
    public $uid = 0;

    #[Validate('required')]
    public string $body = '';

    public function reply()
    {
        if($this->uid > 0) {
            $data = $this->validate();
            $user = User::find($this->uid); 
            $comment = BlogComment::create([
                'body' => $data['body'],
                'user_id' => $user->id,
                'blog_id' => $this->post->id,
            ]);
            $this->body = "";            
        } else {
            $this->redirectRoute('login', ['pid' => $this->post->id]);
        }
    }

    public function like()
    {
        $lk = Like::create(['blog_id' => $this->post->id]);
    }

    public function mount($post)
    {
        $this->uid = (int)session('user_id');
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.front.comment', [
            'comments' => BlogComment::where('blog_id', $this->post->id)->orderBy('created_at', 'asc')->get()
        ]);
    }
}
