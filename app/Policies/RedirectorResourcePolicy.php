<?php

namespace App\Policies;

use App\Models\RedirectorResource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectorResourcePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, RedirectorResource $redirectorResource): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, RedirectorResource $redirectorResource): bool
    {
        return true;
    }

    public function delete(User $user, RedirectorResource $redirectorResource): bool
    {
        return true;
    }

    public function restore(User $user, RedirectorResource $redirectorResource): bool
    {
        return true;
    }

    public function forceDelete(User $user, RedirectorResource $redirectorResource): bool
    {
        return true;
    }
}
