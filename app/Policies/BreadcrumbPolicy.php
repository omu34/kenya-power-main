<?php

namespace App\Policies;

use App\Models\Breadcrumb;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BreadcrumbPolicy
{
    public function view(User $user, Breadcrumb $breadcrumb)
    {
        return true;
        // $user->id === $breadcrumb->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, Breadcrumb $breadcrumb)
    {
        return true;
        // $user->id === $breadcrumb->user_id;
    }

    public function delete(User $user, Breadcrumb $breadcrumb)
    {
        return true;
        // $user->id === $breadcrumb->user_id;
    }
}
