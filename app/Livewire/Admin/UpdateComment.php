<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Comment;
use App\Models\Quiz;

class UpdateComment extends Component
{
    public Comment $comment;

    #[Validate('required|max:500')]
    public string $message = '';

    #[Validate('required|max:254')]
    public string $author = '';

    #[Validate('required')]
    public $quiz_id;

    public function save()
    {
        $data = $this->validate();
        $rec = $this->comment->update($data);

        return redirect()->route('comments');
    }

    public function cancel()
    {
        return redirect()->route('comments');
    }

    public function mount($comment)
    {
        $this->message = $comment->message;    
        $this->author = $comment->author; 
        $this->quiz_id = $comment->quiz_id;     
    }

    public function render()
    {
        return view('livewire.admin.update-comment', [
            'quizzes' => Quiz::orderBy('created_at', 'desc')->get()
        ]);
    }
}
