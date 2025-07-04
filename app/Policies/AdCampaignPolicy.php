<?php

namespace App\Policies;

use App\Models\AdCampaign;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdCampaignPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, AdCampaign $adCampaign): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, AdCampaign $adCampaign): bool
    {
        return true;
    }

    public function delete(User $user, AdCampaign $adCampaign): bool
    {
        return true;
    }

    public function restore(User $user, AdCampaign $adCampaign): bool
    {
        return true;
    }

    public function forceDelete(User $user, AdCampaign $adCampaign): bool
    {
        return true;
    }
}
