<?php

namespace App\Policies;

use App\Models\Footer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FooterPolicy
{
    public function view(User $user, Footer $footer)
    {
        return true;
        // $user->id === $footer->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, Footer $footer)
    {
        return true;
        // $user->id === $footer->user_id;
    }

    public function delete(User $user, Footer $footer)
    {
        return true;
        // $user->id === $footer->user_id;
    }
}
