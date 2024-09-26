<?php

namespace App\Livewire\Admin;

use App\Models\Outline;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;

class BibleOutline extends Component
{
    use WithPagination;

    public $search = null;
    public $sortOrder = null;
    public $asc = false;
    public $sortDir = 'desc';
    public string $showForm = '';

    public Outline $outline;

    public function addOutline()
    {
        $this->showForm = 'add';
    }

    public function editOutline($id)
    {
        $this->outline = Outline::find($id);
        $this->showForm = 'edit';
    }

    public function deleteOutline($id)
    {
        $rec = Outline::find($id)->delete();
    }

    public function download($id)
    {   
        $data = Outline::find($id);
        $pdf = Pdf::loadView('pdfs.admin.outline', ['outline' => $data]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $data->theme.'.pdf');
    }

    public function sort($column)
    {
        $this->asc = !$this->asc;
        if($this->asc == true)
        {
            $this->sortDir = 'asc';
        } else {
            $this->sortDir = 'desc';
        }        
    }

    public function render()
    {
        return view('livewire.admin.bible-outline', [
            'outlines' => Outline::when(filled($this->search), function ($query) {
                $query->where('text', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('support_text', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('theme', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('keyword', 'LIKE', '%'.$this->search.'%')                   
                    ->orWhere('proposition', 'LIKE', '%'.$this->search.'%');                    
            })->when(filled($this->sortOrder), function ($query) {
                $query->orderBy($this->sortOrder, $this->sortDir);
            })->orderBy('created_at', 'desc')->paginate(10),
        ])->layout('components.layouts.admin', [
            'page' => 'outlines',
        ]);
    }
}
