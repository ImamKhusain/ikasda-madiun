<?php

namespace App\Livewire;

use App\Models\Achievement;
use App\Models\Competition;
use App\Models\Department;
use App\Models\Download;
use App\Models\Organizational;
use App\Models\Post;
use App\Models\Recruitment;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Navigation extends Component
{
    #[Computed()]
    public function posts()
    {
        return Post::with('categories')->published()->get()->pluck('categories')->flatten()->unique('id');
    }

    #[Computed()]
    public function subPosts($slug)
    {
        return Post::whereHas('categories', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with('subCategories')->published()->get()->pluck('subCategories')->flatten()->unique('id');
    }

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
    public function recruitments()
    {
        return Recruitment::with('categories')->published()->get()->pluck('categories')->flatten()->unique('id');
    }

    #[Computed()]
    public function competitions()
    {
        return Competition::with('categories')->published()->get()->pluck('categories')->flatten()->unique('id');
    }

    #[Computed()]
    public function subCompetitions($slug)
    {
        return Competition::whereHas('categories', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with('subCategories')->published()->get()->pluck('subCategories')->flatten()->unique('id');
    }

    #[Computed()]
    public function downloads()
    {
        return Download::with('categories')->published()->get()->pluck('categories')->flatten()->unique('id');
    }

    #[Computed()]
    public function achievements()
    {
        return Achievement::published()->orderBy('published_at', 'asc')->get()->groupBy(function ($achievement) {
            return $achievement->published_at->year;
        });
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
