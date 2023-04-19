<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Cast
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;
    public function author(User $user, Cast $cast){
        /*
        if($user->id == $cast->user_id){
            return true;
        }else{

            return false;
        }*/

    }
}
