<?php

namespace App\Policies;

use App\Models\AdResource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdResourcePolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, AdResource $adResource): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, AdResource $adResource): bool
    {
    }

    public function delete(User $user, AdResource $adResource): bool
    {
    }

    public function restore(User $user, AdResource $adResource): bool
    {
    }

    public function forceDelete(User $user, AdResource $adResource): bool
    {
    }
}
