<?php

namespace App\Livewire\Front;

use App\Models\DownloadLimit;
use App\Models\Quiz;
use App\Models\Topic;
use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class QuizMenu extends Component
{
    public int $max = 200;
    public string $topic = '';
    public string $book = '';
    public string $level = '';
    public int $items = 100;
    public int $score = 0;
    public $search = null;

    public function mount($score)
    {
	    $this->score = $score;
	    $itemData = DownloadLimit::select('items')->where('app', 'Bible Quiz')->first();
	    $this->items = (int)$itemData->items;
    }

    public function changeBook()
    {
        $this->dispatch('change-book', book: $this->book);
    }

    public function changeTopic()
    {
        $this->dispatch('change-topic', topic: $this->topic);
    }

    public function changeLevel()
    {
        $this->dispatch('change-level', level: $this->level);
    }

    public function changeItems()
    {
        $this->dispatch('change-items', items: $this->items);
    }

    public function searchItem()
    {
        $this->dispatch('search', search: $this->search);
    }

    public function generatePdf()
    {
        $limit = DownloadLimit::select('limit')->where('app', 'Bible Quiz')->first();
        $data = [
            'level' => $this->level,
            'quizzes' => Quiz::when(filled($this->topic), function ($query) {
                $query->where('topic_id', $this->topic);
            })
                ->when(filled($this->level), function ($query) {
                    $query->where('level', $this->level);
                })->limit((int) $limit->limit)->inRandomOrder()->get(),
        ];

        $pdf = Pdf::loadView('pdfs.quizzes', $data);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Bible_Quizzes.pdf');
    }

    public function render()
    {
        return view('livewire.front.quiz-menu', [
            'topics' => Topic::all(),
            'books' => Book::all(),
        ]);
    }
}
