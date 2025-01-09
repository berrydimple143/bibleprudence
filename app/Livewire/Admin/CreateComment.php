<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Comment;
use App\Models\Quiz;

class CreateComment extends Component
{
    #[Validate('required|max:500')]
    public string $message = '';

    #[Validate('required|max:254')]
    public string $author = '';

    #[Validate('required')]
    public $quiz_id;

    public function save()
    {
        $data = $this->validate();
        $comment = Comment::create($data);

        return redirect()->route('comments');
    }

    public function cancel()
    {
        return redirect()->route('comments');
    }

    public function render()
    {
        return view('livewire.admin.create-comment', [
            'quizzes' => Quiz::orderBy('created_at', 'desc')->get()
        ]);
    }
}
