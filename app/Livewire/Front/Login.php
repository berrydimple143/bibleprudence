<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Blog;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $pid = null;
    public $hasError = false;

    #[Validate('required|email|max:254')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public function mount($pid)
    {
        $this->pid = $pid;
    }

    public function register()
    {
        session()->flash('pid', $this->pid);
        $this->redirectRoute('register');
    }

    public function save()
    {
        if(!Auth::attempt(['email' => $this->email, 'password' => $this->password])) 
        {
            $this->hasError = true;
        } else {
            $post = Blog::find($this->pid);
            session()->flash('msg', 'You can now submit your comment for this post.');
            $this->redirectRoute('post', ['id' => $post->id, 'slug' => getSlug($post->title)]);
        }
    }

    public function render()
    {
        $post = Blog::find($this->pid);
        return view('livewire.front.login', ['post' => $post])->layout('components.layouts.registration', [
            'page' => 'login',
            'title' => 'Bible Prudence Login Form',
            'keywords' => 'Bible Prudence Login',
            'description' => 'Login form',
            'author' => 'Virgil Rosalita',
            'application_name' => 'Bible Prudence',
            'generator' => 'Laravel Livewire 3.0',
            'robots' => 'index, follow',
        ]);
    }
}
