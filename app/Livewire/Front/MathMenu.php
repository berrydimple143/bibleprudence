<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DownloadLimit;
use App\Models\Bmath;

class MathMenu extends Component
{
    public int $max = 150;
    public int $score = 0;
    public int $items = 100;
    public string $level = '';
    public $search = null;

    public function mount($score)
    {
        $this->score = $score;     
        $itemData = DownloadLimit::select('items')->where('app', 'Bible Math')->first();
        $this->items = (int)$itemData->items;   
    }

    public function changeLevel()
    {
        $this->dispatch('change-math-level', level: $this->level);
    }

    public function changeItems()
    {        
        $this->dispatch('change-math-items', items: $this->items);
    }

    public function searchItem()
    {
        $this->dispatch('search-math', search: $this->search);
    }

    public function generatePdf()
    {
        $limit = DownloadLimit::select('limit')->where('app', 'Bible Math')->first();
        $data = [
            'level' => $this->level,
            'maths' => Bmath::when(filled($this->level), function ($query) {
                    $query->where('level', $this->level);
                })->limit((int) $limit->limit)->inRandomOrder()->get(),
        ];

        $pdf = Pdf::loadView('pdfs.maths', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Bible_Math.pdf');
    }

    public function render()
    {
        return view('livewire.front.math-menu');
    }
}
