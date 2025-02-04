<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [];
        $post = new Post;
        $categories = Category::query()->where('model', $post->getMorphClass())->orderBy('name', 'asc')->pluck('name', 'id');

        foreach ($categories as $id => $category) {
            $tabs[$category] = Tab::make($category)
                ->modifyQueryUsing(function (Builder $query) use ($id) {
                    return $query->where('category_id', $id);
                });
        }

        return $tabs;
    }
}
