<?php

namespace App\Traits;

use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

trait HasStatuses
{
    public function statuses(): MorphOne
    {
        return $this->morphOne(Status::class, 'model', 'model_type', 'model_id')->latest('id');
    }

    public function createStatus($status)
    {
        $this->statuses()->create([
            'name' => $status,
        ]);

        return $this;
    }

    public function updateStatus($status)
    {
        $this->statuses()->update([
            'name' => $status,
        ]);

        $this->update(['published_at' => Carbon::now()]);

        return $this;
    }

    public function getStatusName(): array
    {
        return $this->statuses()->pluck('name', 'id')->all();
    }

    public function __get($key): mixed
    {
        if ($key === 'status') {
            return (string) $this->statuses()->first();
        }

        return parent::__get($key);
    }

    public function scopeCurrentStatus(Builder $builder, ...$names)
    {
        $names = is_array($names) ? Arr::flatten($names) : func_get_args();
        $builder
            ->whereHas(
                'statuses',
                function (Builder $query) use ($names) {
                    $query
                        ->whereIn('name', $names);
                }
            );
    }
}
