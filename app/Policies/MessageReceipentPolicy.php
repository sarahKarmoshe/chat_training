<?php

namespace App\Policies;

use App\Models\Message_receipent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessageReceipentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message_receipent  $messageReceipent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Message_receipent $messageReceipent)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message_receipent  $messageReceipent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Message_receipent $messageReceipent)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message_receipent  $messageReceipent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Message_receipent $messageReceipent)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message_receipent  $messageReceipent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Message_receipent $messageReceipent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message_receipent  $messageReceipent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Message_receipent $messageReceipent)
    {
        //
    }
}
