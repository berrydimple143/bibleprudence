<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Scavenger as BibleScavenger;
use App\Http\Controllers\HelperController;

class Scavenger extends Component
{
    use WithPagination;

    public int $counter = 1;
    public int $items = 100;
    public int $score = 0;
    public $search = null;

    #[On('change-score')]
    public function changeScore($scr)
    {
        $this->score += $scr;
    }

    #[On('search-scavenger')]
    public function searchScavenger($search)
    {
        $this->search = $search;
    }

    #[On('change-scavenger-items')]
    public function changeItems($items)
    {
        session()->put('total_scavenger', (int)$items);
        $this->items = (int)$items;
    }
    
    public function mount()
    {
        ini_set('max_execution_time', 36000);
        session()->put('scscore', 0);
        session()->put('scquestions', []);
        session()->put('taken_scavenger', 0);
        session()->put('total_scavenger', 100);
    }

    public function render()
    {
        $seo = HelperController::getSeo('Scavenger');
        
        return view('livewire.front.scavenger', [
            'scavengers' => BibleScavenger::when(filled($this->search), function ($query) {
                $query->where('question', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('answer', 'LIKE', '%'.$this->search.'%')  
                    ->orWhere('verse', 'LIKE', '%'.$this->search.'%');                  
            })->limit($this->items)->inRandomOrder()->get(),
        ])->layout('components.layouts.app', [
            'page' => 'scavenger',
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
