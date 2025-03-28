<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class UpdateBlog extends Component
{
    public Blog $blog;

    #[Validate('required')]
    public string $title = '';    

    #[Validate('required')]
    public string $author = '';

    #[Validate('required')]
    public string $body = '';

    #[Validate('required')]
    public string $status = '';

    #[Validate('nullable')]
    public $topic = '';

    #[Validate('nullable')]
    public $image = "";

    #[Validate('nullable')]
    public $video = "";

    #[Validate('nullable')]
    public $audio = "";

    public $bid = "";
    public $datePosted = "";

    public function save()
    {
        $data = $this->validate();
        $stat = $data['status'] == 'Draft' ? false : true; 
        $pst = Blog::find($this->bid);   
        $now = Carbon::now();            
        $posted = (empty($this->datePosted) && ($pst->status == 0 || $pst->status == '0') && ($stat == true)) ? $now : $this->datePosted;
        $rec = $this->blog->update([
                    'title' => $data['title'],
                    'author' => $data['author'],
                    'body' => $data['body'],
                    'topic' => $data['topic'],
                    'image' => $data['image'],
                    'video' => $data['video'],
                    'audio' => $data['audio'],
                    'status' => $stat,
                    'date_posted' => $posted,
                ]);

        return redirect()->route('bible.blog');
    }

    public function cancel()
    {
        return redirect()->route('bible.blog');
    }

    public function mount($blog)
    {
        $this->title = $blog->title;
        $this->author = $blog->author;
        $this->body = $blog->body;
        $this->topic = $blog->topic;
        $this->image = $blog->image;
        $this->video = $blog->video;
        $this->audio = $blog->audio;
        $this->bid = $blog->id;
        $this->datePosted = $blog->date_posted;        
        $this->status = $blog->status == true ? 'Live' : 'Draft';       
    }

    public function render()
    {
        return view('livewire.admin.update-blog');
    }
}
