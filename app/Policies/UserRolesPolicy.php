<?php

namespace App\Policies;

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class UserRolesPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function admin(): bool
    {
        return Auth::user()->role == UserRole::Admin;
    }
}
