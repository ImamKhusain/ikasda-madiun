<?php

namespace App\Livewire;

use App\Models\Alumni;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AlumniList extends Component
{
    use WithPagination;

    #[Computed()]
    public function alumnis()
    {
        return Alumni::published()->orderBy('created_at', 'desc')->paginate(12);
    }

    public function render()
    {
        return view('livewire.alumni-list');
    }
}
