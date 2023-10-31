<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait WhereLike
{
    public function scopeWhereLike(Builder $query, string $column, string|null $keyword): Builder
    {
        if(!$keyword) {
            return $query;
        }
        return $query->where($column, 'like', '%' . addcslashes($keyword, '%_\\') . '%');
    }
}
