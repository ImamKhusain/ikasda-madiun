<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PostComments extends Component
{
    use WithPagination;

    public $model;

    public $users = [];

    public $showDropdown = false;

    protected $numberOfPaginatorsRendered = [];

    public $newCommentState = [
        'body' => ''
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    protected $validationAttributes = [
        'newCommentState.body' => 'comment'
    ];

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application|null
     */
    public function render(
    ): Factory| Application| View|\Illuminate\Contracts\Foundation\Application|null
    {
        $comments = $this->model
            ->comments()
            // ->with('user', 'children.user', 'children.children')
            ->parent()
            ->latest()
            ->paginate(5);

        return view('livewire.post-comments', [
            'comments' => $comments
        ]);
    }

    /**
     * @return void
     */
    #[On('refresh')]
    public function postComment(): void
    {

        $this->validate([
            'newCommentState.body' => 'required'
        ]);

        $user = auth()->check() ? auth()->user() : null;

        $this->model->comment($user, $this->newCommentState);

        $this->newCommentState = [
            'body' => ''
        ];
        $this->users = [];
        $this->showDropdown = false;

        $this->resetPage();
        session()->flash('message', 'Comment Posted Successfully!');
    }

}
