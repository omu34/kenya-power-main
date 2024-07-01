<?php

namespace App\Policies;

use App\Models\LatestGallery;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LatestGalleryPolicy
{
    public function view(User $user, LatestGallery $latestGallery)
    {
        return true;
        // $user->id === $latestGallery->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, LatestGallery $latestGallery)
    {
        return true;
        // $user->id === $latestGallery->user_id;
    }

    public function delete(User $user, LatestGallery $latestGallery)
    {
        return true;
        // $user->id === $latestGallery->user_id;
    }
}
