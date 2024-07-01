<?php

namespace App\Policies;

use App\Models\BasicBanner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BasicBannerPolicy
{
    public function view(User $user, BasicBanner $basicBanner)
    {
        return true;
        // $user->id === $basicBanner->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, BasicBanner $basicBanner)
    {
        return true;
        // $user->id === $basicBanner->user_id;
    }

    public function delete(User $user, BasicBanner $basicBanner)
    {
        return true;
        // $user->id === $basicBanner->user_id;
    }
}
