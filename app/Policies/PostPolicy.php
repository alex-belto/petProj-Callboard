<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PostPolicy
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

    public function edit(User $user, Post $post)
    {
        if($post -> user_id == $user -> id)
        {
            return true;
        }
        return false;
    }
    public function delete(User $user, Post $post)
    {
            $userId = Auth::id();

            if($post -> user_id == $userId)
            {
                return true;
            }
            return false;


    }
}
