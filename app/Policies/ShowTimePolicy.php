<?php

namespace App\Policies;

use App\Models\ShowTime;
use App\Models\User;

class ShowTimePolicy
{
    /**
     * Determine whether the user can view any showtimes.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.showtimes');
    }

    /**
     * Determine whether the user can view the showtime.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Product $product
     * @return mixed
     */
    public function view(User $user, ShowTime $showtime)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.showtimes');
    }

    /**
     * Determine whether the user can create showtime.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.showtimes');
    }

    /**
     * Determine whether the user can update the showtime.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ShowTime $showtime
     * @return mixed
     */
    public function update(User $user, ShowTime $showtime)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.showtimes');
    }

    /**
     * Determine whether the user can delete the showtime.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ShowTime $showtime
     * @return mixed
     */
    public function delete(User $user, ShowTime $showtime)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.showtimes');
    }

    /**
     * Determine whether the user can view trashed showtimes.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.showtimes')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ShowTime $showtime
     * @return mixed
     */
    public function restore(User $user, ShowTime $showtime)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.showtimes')) && $this->trashed($showtime);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\ShowTime $showtime
     * @return mixed
     */
    public function forceDelete(User $user, ShowTime $showtime)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('manage.showtimes')) && $this->trashed($showtime);
    }

    /**
     * Determine wither the given showtime is trashed.
     *
     * @param $showtime
     * @return bool
     */
    public function trashed($showtime)
    {
        return $this->hasSoftDeletes() && method_exists($showtime, 'trashed') && $showtime->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(ShowTime::class))->getTraits())
        );
    }
}
