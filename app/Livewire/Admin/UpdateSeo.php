<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Seo;

class UpdateSeo extends Component
{
    public Seo $seo;

    #[Validate('required')]
    public string $page = '';

    #[Validate('required')]
    public string $title = '';

    #[Validate('nullable')]
    public string $description = '';

    #[Validate('nullable')]
    public string $url = '';

    #[Validate('nullable')]
    public string $author = '';

    #[Validate('nullable')]
    public string $robots = '';

    #[Validate('nullable')]
    public string $image = '';

    #[Validate('nullable')]
    public string $keywords = '';

    #[Validate('nullable')]
    public string $application_name = '';

    #[Validate('nullable')]
    public string $generator = '';

    public function save()
    {
        $data = $this->validate();
        $rec = $this->seo->update($data);

        return redirect()->route('seo');
    }

    public function cancel()
    {
        return redirect()->route('seo');
    }

    public function mount($seo)
    {
        $this->page = $seo->page;
        $this->title = $seo->title;
        $this->description = $seo->description;
        $this->url = $seo->url;
        $this->author = $seo->author;
        $this->robots = $seo->robots;
        $this->image = $seo->image;   
        $this->keywords = $seo->keywords;
        $this->application_name = $seo->application_name;
        $this->generator = $seo->generator;   
    }

    public function render()
    {
        return view('livewire.admin.update-seo');
    }
}
