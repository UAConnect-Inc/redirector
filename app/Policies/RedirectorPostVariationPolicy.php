<?php

namespace App\Policies;

use App\Models\RedirectorPostVariation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectorPostVariationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, RedirectorPostVariation $redirectorPostVariation): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, RedirectorPostVariation $redirectorPostVariation): bool
    {
        return true;
    }

    public function delete(User $user, RedirectorPostVariation $redirectorPostVariation): bool
    {
        return true;
    }

    public function restore(User $user, RedirectorPostVariation $redirectorPostVariation): bool
    {
        return true;
    }

    public function forceDelete(User $user, RedirectorPostVariation $redirectorPostVariation): bool
    {
        return true;
    }
}
