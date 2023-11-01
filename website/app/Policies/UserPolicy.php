<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the Instagram feed.
     *
     * @param  \App\Models\User  $user
     * @param  int  $requestedUserId
     * @return bool
     */
    public function view(User $user, $requestedUserId)
    {
        return $user->id === $requestedUserId;
    }
}
