<?php

namespace App\Policies;

use App\Models\LatestNews;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LatestNewsPolicy
{
    public function view(User $user, LatestNews $latestNews)
    {
        return true;
        // $user->id === $latestNews->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, LatestNews $latestNews)
    {
        return true;
        // $user->id === $latestNews->user_id;
    }

    public function delete(User $user, LatestNews $latestNews)
    {
        return true;
        // $user->id === $latestNews->user_id;
    }
}
