<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $authUser, User $updatedUser ): bool //just admin can change inf about admin and moderator
    {
        foreach($updatedUser -> roles as $roleUp)
        {

            if($roleUp -> name == 'admin' OR $roleUp -> name == 'moderator')
            {
                foreach($authUser -> roles as $roleAut)
                {
                    if($roleAut -> name == 'admin')
                    {

                        return true;
                    }else{
                        return false;
                    }
                }
            }

        }
        return true;
    }

    public function updateJustAdmin(User $user)
    {
        foreach($user -> roles as $role){
            if($role -> name  == 'admin')
            {
                return true;
            }
        }

        return false;
    }



}
