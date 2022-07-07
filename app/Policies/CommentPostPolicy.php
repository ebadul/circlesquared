<?php

namespace App\Policies;

use App\Models\CommentPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPostPolicy
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
     * @param  \App\Models\CommentPost  $commentPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CommentPost $commentPost)
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
     * @param  \App\Models\CommentPost  $commentPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CommentPost $commentPost)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommentPost  $commentPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CommentPost $commentPost)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommentPost  $commentPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CommentPost $commentPost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CommentPost  $commentPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CommentPost $commentPost)
    {
        //
    }
}
