<?php

namespace App\Policies;

use App\Models\RedirectorPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectorPostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, RedirectorPost $redirectorPost): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, RedirectorPost $redirectorPost): bool
    {
        return true;
    }

    public function delete(User $user, RedirectorPost $redirectorPost): bool
    {
        return true;
    }

    public function restore(User $user, RedirectorPost $redirectorPost): bool
    {
        return true;
    }

    public function forceDelete(User $user, RedirectorPost $redirectorPost): bool
    {
        return true;
    }
}
