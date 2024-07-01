<?php

namespace App\Policies;

use App\Models\HeaderNavigation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HeaderNavigationPolicy
{
    public function view(User $user, HeaderNavigation $headerNavigation)
    {
        return true;
        // $user->id === $headerNavigation->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, HeaderNavigation $headerNavigation)
    {
        return true;
        // $user->id === $headerNavigation->user_id;
    }

    public function delete(User $user, HeaderNavigation $headerNavigation)
    {
        return true;
        // $user->id === $headerNavigation->user_id;
    }
}
