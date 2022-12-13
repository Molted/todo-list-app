<?php

namespace App\Models\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait AllowedFilterSearch
{
    public function scopeForUser(Builder $query, User $user)
    {
        // return $query->where('user_id', $user->id);
        return $query->whereBelongsTo($user);
    }
}