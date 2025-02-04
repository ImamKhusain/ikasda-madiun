<?php

namespace App\Livewire;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Str;

class Comment extends Component
{

    public $comment;

    public $users = [];

    public $isReplying = false;
    public $hasReplies = false;

    public $showOptions = false;

    public $isEditing = false;

    public $replyState = [
        'body' => ''
    ];

    public $editState = [
        'body' => ''
    ];

    protected $validationAttributes = [
        'replyState.body' => 'Reply',
        'editState.body' => 'Reply'
    ];



    /**
     * @param $isEditing
     * @return void
     */
    public function updatedIsEditing($isEditing): void
    {
        if (!$isEditing) {
            return;
        }
        $this->editState = [
            'body' => $this->comment->body
        ];
    }

    /**
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function editComment(): void
    {
        $this->validate([
            'editState.body' => 'required|min:2'
        ]);
        $this->comment->update($this->editState);
        $this->isEditing = false;
        $this->showOptions = false;
    }

    /**
     * @return void
     * @throws AuthorizationException
     */
    #[On('refresh')]
    public function deleteComment(): void
    {
        $this->comment->delete();
        $this->showOptions = false;
        $this->dispatch('refresh');
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application|null
     */
    public function render(
    ): Factory| Application| View|\Illuminate\Contracts\Foundation\Application|null
    {
        return view('livewire.comment');
    }

    /**
     * @return void
     */
    #[On('refresh')]
    public function postReply(): void
    {
        if (!$this->comment->isParent()) {
            return;
        }
        $this->validate([
            'replyState.body' => 'required'
        ]);

        $user = auth()->check() ? auth()->user() : null;

        $this->comment->replyComment($user, $this->replyState);

        $this->replyState = [
            'body' => ''
        ];
        $this->isReplying = false;
        $this->showOptions = false;
        $this->dispatch('refresh')->self();
    }

}
