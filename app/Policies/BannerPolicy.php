<?php

namespace App\Policies;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BannerPolicy
{
    public function view(User $user, Banner $banner)
    {
        return true;
        // $user->id === $banner->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, Banner $banner)
    {
        return true;
        // $user->id === $banner->user_id;
    }

    public function delete(User $user, Banner $banner)
    {
        return true;
        // $user->id === $banner->user_id;
    }
}
