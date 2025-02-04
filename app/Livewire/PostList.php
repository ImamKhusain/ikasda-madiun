<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Tags\Tag;

class PostList extends Component
{
    use WithPagination;

    public $category;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $tag = '';

    #[Url()]
    public $subCategory = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->tag = '';
        $this->subCategory = '';
        $this->resetPage();
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()->withCategory($this->category->slug)->when($this->activeSubCategory, function ($query) {
            $query->withSubCategory($this->subCategory);
        })->with('tags')->when($this->activeTag, function ($query) {
            $query->WithAllTags($this->tag);
        })->search($this->search)->orderBy('published_at', $this->sort)->paginate(2);
    }

    #[Computed()]
    public function activeTag()
    {
        if ($this->tag === null || $this->tag === '') {
            return null;
        }

        return Tag::findFromString($this->tag);
    }

    #[Computed()]
    public function activeSubCategory()
    {
        if ($this->subCategory === null || $this->subCategory === '') {
            return null;
        }

        return Category::where('slug', $this->subCategory)->first();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
