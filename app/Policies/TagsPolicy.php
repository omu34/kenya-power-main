<?php

namespace App\Policies;

use App\Models\Tags;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TagsPolicy
{
    public function view(User $user, Tags $tags)
    {
        return true;
        // $user->id === $tags->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, Tags $tags)
    {
        return true;
        // $user->id === $tags->user_id;
    }

    public function delete(User $user, Tags $tags)
    {
        return true;
        // $user->id === $tags->user_id;
    }
}
