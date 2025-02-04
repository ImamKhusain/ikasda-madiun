<?php

namespace App\Livewire;

use App\Models\Merchandise;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class MerchandiseList extends Component
{
    use WithPagination;

    #[Computed()]
    public function merchandises()
    {
        return Merchandise::published()->orderBy('published_at', 'desc')->paginate(12);
    }

    public function render()
    {
        return view('livewire.merchandise-list');
    }
}
