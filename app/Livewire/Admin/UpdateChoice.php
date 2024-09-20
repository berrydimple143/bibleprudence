<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Selection;
use App\Models\Quiz;
use Livewire\Attributes\Validate;

class UpdateChoice extends Component
{
    public Selection $choise;

    #[Validate('required')]
    public $option;

    #[Validate('required')]
    public $quiz_id;

    public $choice_id;

    public function save()
    {
        $data = $this->validate();        
        $rec = Selection::find($this->choice_id)->update($data);

        return redirect()->route('choices');
    }

    public function cancel()
    {
        return redirect()->route('choices');
    }

    public function mount($choice)
    {
        $this->option = $choice->option;     
        $this->quiz_id = $choice->quiz_id;
        $this->choice_id = $choice->id;
    }

    public function render()
    {
        return view('livewire.admin.update-choice', [
            'quizzes' => Quiz::all(),
        ]);
    }
}
