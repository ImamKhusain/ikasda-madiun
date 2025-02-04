<?php

namespace App\Models;

use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoriable(): MorphTo
    {
        return $this->morphTo();
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->oldest();
    }
}
