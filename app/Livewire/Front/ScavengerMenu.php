<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\DownloadLimit;
use App\Models\Scavenger;
use Barryvdh\DomPDF\Facade\Pdf;

class ScavengerMenu extends Component
{
    public int $score = 0;
    public int $items = 50;
    public $search = null;

    public function mount($score)
    {
        $this->score = $score;
    }

    public function searchItem()
    {
        $this->dispatch('search-scavenger', search: $this->search);
    }

    public function changeItems()
    {
        $this->dispatch('change-scavenger-items', items: $this->items);     
    }

    public function generatePdf()
    {
        $limit = DownloadLimit::select('limit')->where('app', 'Bible Scavenger')->first();
        $data = [
            'scavengers' => Scavenger::inRandomOrder()->limit((int) $limit->limit)->get(),
        ];

        $pdf = Pdf::loadView('pdfs.scavengers', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Bible_Scavengers.pdf');
    }

    public function render()
    {
        return view('livewire.front.scavenger-menu');
    }
}
