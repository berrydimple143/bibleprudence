<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class CreateBlog extends Component
{
    #[Validate('required|unique:blogs,title')]
    public string $title = '';    

    #[Validate('required')]
    public string $author = '';

    #[Validate('required')]
    public string $body = '';

    #[Validate('required')]
    public string $status = 'Draft';

    #[Validate('nullable')]
    public string $topic = '';

    #[Validate('nullable')]
    public string $image;

    #[Validate('nullable')]
    public string $video;

    #[Validate('nullable')]
    public string $audio;    

    public function save()
    {        
        $data = $this->validate();
        $stat = $data['status'] == 'Draft' ? false : true;
        $posted = $stat == true ? Carbon::now() : null;    
        $rec = Blog::create([
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

    public function render()
    {
        return view('livewire.admin.create-blog');
    }
}
