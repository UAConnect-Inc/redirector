<?php

namespace App\Policies;

use App\Models\RedirectorCampaign;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectorCampaignPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, RedirectorCampaign $redirectorCampaign): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, RedirectorCampaign $redirectorCampaign): bool
    {
        return true;
    }

    public function delete(User $user, RedirectorCampaign $redirectorCampaign): bool
    {
        return true;
    }

    public function restore(User $user, RedirectorCampaign $redirectorCampaign): bool
    {
        return true;
    }

    public function forceDelete(User $user, RedirectorCampaign $redirectorCampaign): bool
    {
        return true;
    }
}
