<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;

class MoviePolicy
{
    /**
     * Determine whether the user can view any movies.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.movies');
    }

    /**
     * Determine whether the user can view the eventday.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Movie $movie
     * @return mixed
     */
    public function view(User $user, Movie $movie)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.movies');
    }

    /**
     * Determine whether the user can create eventday.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.movies');
    }

    /**
     * Determine whether the user can update the eventday.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Movie $movie
     * @return mixed
     */
    public function update(User $user, Movie $movie)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.movies');
    }

    /**
     * Determine whether the user can delete the eventday.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventDay $eventday
     * @return mixed
     */
    public function delete(User $user, Movie $movie)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.movies');
    }

    /**
     * Determine whether the user can view trashed movies.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isSuperAdmin() || $user->hasPermissionTo('manage.movies')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventDay $eventday
     * @return mixed
     */
    public function restore(User $user, Movie $movie)
    {
        return ($user->isSuperAdmin() || $user->hasPermissionTo('manage.movies')) && $this->trashed($movie);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\eventday $eventday
     * @return mixed
     */
    public function forceDelete(User $user, Movie $movie)
    {
        return ($user->isSuperAdmin()  || $user->hasPermissionTo('manage.movies')) && $this->trashed($movie);
    }

    /**
     * Determine wither the given eventday is trashed.
     *
     * @param $eventday
     * @return bool
     */
    public function trashed($movie)
    {
        return $this->hasSoftDeletes() && method_exists($movie, 'trashed') && $movie->trashed();
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
            array_keys((new \ReflectionClass(Movie::class))->getTraits())
        );
    }
}
