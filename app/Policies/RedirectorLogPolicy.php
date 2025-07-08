<?php

namespace App\Policies;

use App\Models\RedirectorLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectorLogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, RedirectorLog $redirectorLog): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, RedirectorLog $redirectorLog): bool
    {
    }

    public function delete(User $user, RedirectorLog $redirectorLog): bool
    {
    }

    public function restore(User $user, RedirectorLog $redirectorLog): bool
    {
    }

    public function forceDelete(User $user, RedirectorLog $redirectorLog): bool
    {
    }
}
