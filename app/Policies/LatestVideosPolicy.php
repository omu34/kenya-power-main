<?php

namespace App\Policies;

use App\Models\LatestVideos;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LatestVideosPolicy
{
    public function view(User $user, LatestVideos $latestVideos)
    {
        return true;
        // $user->id === $latestVideos->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, LatestVideos $latestVideos)
    {
        return true;
        // $user->id === $latestVideos->user_id;
    }

    public function delete(User $user, LatestVideos $latestVideos)
    {
        return true;
        // $user->id === $latestVideos->user_id;
    }
}
