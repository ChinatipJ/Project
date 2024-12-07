<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\User;

class FoodPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Food $food): bool {
        return $user->id === $food->user_id || $user->isAdministrator();
    }
    
    
}
    
