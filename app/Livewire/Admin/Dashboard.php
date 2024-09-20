<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\DownloadLimit;
use App\Models\Seo;
use App\Models\Scavenger;
use App\Models\Target;
use App\Models\Quiz;
use App\Models\Selection;
use App\Models\Topic;
use Livewire\Component;

class Dashboard extends Component
{
    public function goto($rt)
    {
        return redirect()->route($rt);
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'total_easy_quiz' => Quiz::where('level', 'Easy')->count(),
            'total_average_quiz' => Quiz::where('level', 'Average')->count(),
            'total_hard_quiz' => Quiz::where('level', 'Hard')->count(),
            'total_choice' => Selection::all()->count(),
            'total_topic' => Topic::all()->count(),
            'total_comment' => Comment::all()->count(),
            'total_contact' => Contact::all()->count(),
            'total_download_limit' => DownloadLimit::all()->count(),
            'total_seo' => Seo::all()->count(),
            'total_scavenger' => Scavenger::all()->count(),
            'total_target' => Target::all()->count(),
        ])->layout('components.layouts.admin', [
            'page' => 'home',
        ]);
    }
}
