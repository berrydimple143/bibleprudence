<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Bmath as BibleMath;
use App\Http\Controllers\HelperController;

class Bmath extends Component
{
    use WithPagination;

    public int $counter = 1;
    public int $items = 100;
    public int $score = 0;
    public $search = null;
    public $level = null;

    #[On('change-score')]
    public function changeScore($scr)
    {
        $this->score += $scr;
    }

    #[On('search-math')]
    public function searchMath($search)
    {
        $this->search = $search;
    }

    #[On('change-math-items')]
    public function changeItems($items)
    {
        session()->put('total_math', (int)$items);
        $this->items = (int)$items;
    }

    #[On('change-math-level')]
    public function changeLevel($level)
    {
        $this->level = $level;
    }
    
    public function mount()
    {
        ini_set('max_execution_time', 36000);
        session()->put('mtscore', 0);
        session()->put('mtquestions', []);
        session()->put('taken_math', 0);
        session()->put('total_math', 100);
    }

    public function render()
    {
        $seo = HelperController::getSeo('Math');

        return view('livewire.front.bmath', [
            'bmaths' => BibleMath::when(filled($this->search), function ($query) {
                $query->where('question', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('answer', 'LIKE', '%'.$this->search.'%')  
                    ->orWhere('level', 'LIKE', '%'.$this->search.'%') 
                    ->orWhere('formula', 'LIKE', '%'.$this->search.'%') 
                    ->orWhere('verses', 'LIKE', '%'.$this->search.'%');                  
            })->when(filled($this->level), function ($query) {
                $query->where('level', $this->level);      
            })->limit($this->items)->inRandomOrder()->get(),
        ])->layout('components.layouts.app', [
            'page' => 'math',
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
