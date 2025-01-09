<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Seo;

class CreateSeo extends Component
{
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
        $seo = Seo::create($data);

        return redirect()->route('seo');
    }

    public function cancel()
    {
        return redirect()->route('seo');
    }

    public function render()
    {
        return view('livewire.admin.create-seo');
    }
}
