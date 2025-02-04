<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class LikeButton extends Component
{
    public $model;

    public function toggleLike()
    {
        $user = auth()->check() ? auth()->user() : null;

        if (!$this->model->hasLiked($user)) {
            $this->model->like($user);
        } else {
            $this->model->dislike($user);
        }

        return;

    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
