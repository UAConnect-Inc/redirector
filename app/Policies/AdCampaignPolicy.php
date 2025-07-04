<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdCampaignPolicy{
    use HandlesAuthorization;

    public function action(User $user): bool
    {
        //
    }
}
