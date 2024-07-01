<?php

namespace App\Policies;

use App\Models\FeaturedNews;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FeaturedNewsPolicy
{
    public function view(User $user, FeaturedNews $featuredNews)
    {
        return true;
        // $user->id === $featuredNews->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, FeaturedNews $featuredNews)
    {
        return true;
        // $user->id === $featuredNews->user_id;
    }

    public function delete(User $user, FeaturedNews $featuredNews)
    {
        return true;
        // $user->id === $featuredNews->user_id;
    }
}
