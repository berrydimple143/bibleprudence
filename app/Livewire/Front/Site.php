<?php

namespace App\Livewire\Front;

use App\Models\Quiz;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\HelperController;

class Site extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshPage' => '$refresh',
    ];

    public $search = null;

    public int $counter = 1;

    public int $score = 0;

    public $topic = null;

    public $level = null;

    #[On('change-score')]
    public function changeScore($scr)
    {
        $this->score += $scr;
    }

    #[On('change-topic')]
    public function changeTopic($topic)
    {
        $this->topic = $topic;
    }

    #[On('change-level')]
    public function changeLevel($level)
    {
        $this->level = $level;
    }

    #[On('search')]
    public function searchQuiz($search)
    {
        $this->search = $search;
    }

    public function mount()
    {
        ini_set('max_execution_time', 36000);
        session()->put('score', 0);
        session()->put('questions', []);
    }

    public function render()
    {
        $seo = HelperController::getSeo('Quiz');

        return view('livewire.front.site', [
            'quizzes' => Quiz::when(filled($this->topic), function ($query) {
                $query->where('topic_id', $this->topic);
            })->when(filled($this->search), function ($query) {
                $query->where('question', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('answer', 'LIKE', '%'.$this->search.'%');                    
            })->when(filled($this->level), function ($query) {
                    $query->where('level', $this->level);
            })->inRandomOrder()->paginate(20),
        ])->layout('components.layouts.app', [
            'page' => 'quiz',
            'title' => $seo->title,
            'keywords' => $seo->keywords,
            'description' => $seo->description,
            'author' => $seo->author,
            'application_name' => $seo->application_name,
            'generator' => $seo->generator,
            'robots' => $seo->robots,
        ]);
    }
}
