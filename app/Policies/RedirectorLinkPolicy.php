<?php

namespace App\Policies;

use App\Models\RedirectorLink;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectorLinkPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, RedirectorLink $redirectorLink): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, RedirectorLink $redirectorLink): bool
    {
        return true;
    }

    public function delete(User $user, RedirectorLink $redirectorLink): bool
    {
        return true;
    }

    public function restore(User $user, RedirectorLink $redirectorLink): bool
    {
        return true;
    }

    public function forceDelete(User $user, RedirectorLink $redirectorLink): bool
    {
        return true;
    }
}
