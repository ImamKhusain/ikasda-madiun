<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Posts extends Component
{
    public $category = "artikel";

    #[On('category')]
    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()->withCategory($this->category)->with('tags')->get();
    }

    public function render(Post $post)
    {
        $categories = Category::where('model', $post->getMorphClass())->orderBy('name', 'asc')->get();
        $posts = Post::with('tags')->published()->get();
        return view('livewire.posts', ['categories' => $categories, 'posts' => $posts]);
    }
}
