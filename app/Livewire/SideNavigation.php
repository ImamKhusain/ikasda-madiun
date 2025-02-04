<?php

namespace App\Livewire;

use App\Models\Download;
use App\Models\Organizational;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SideNavigation extends Component
{
    #[Computed()]
    public function organizationals()
    {
        return Organizational::all();
    }

    public function render()
    {
        return view('livewire.side-navigation');
    }
}
