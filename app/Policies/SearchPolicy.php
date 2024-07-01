<?php

namespace App\Policies;

use App\Models\Search;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SearchPolicy
{
    public function view(User $user, Search $search)
    {
        return true;
        // $user->id === $search->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, Search $search)
    {
        return true;
        // $user->id === $search->user_id;
    }

    public function delete(User $user, Search $search)
    {
        return true;
        // $user->id === $search->user_id;
    }
}
