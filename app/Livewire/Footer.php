<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Download;
use App\Models\Organizational;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Footer extends Component
{
    #[Computed()]
    public function organizationals()
    {
        return Organizational::all();
    }

    #[Computed()]
    public function departments()
    {
        return Department::all();
    }

    #[Computed()]
    public function downloads()
    {
        return Download::with('categories')->published()->get()->pluck('categories')->flatten()->unique('id');
    }

    public function render()
    {
        return view('livewire.footer');
    }
}
