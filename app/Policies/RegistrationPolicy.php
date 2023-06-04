<?php

namespace App\Policies;

use App\Models\EventRegistration;
use App\Models\Movie;
use App\Models\User;

class MoviePolicy
{
    /**
     * Determine whether the user can view any registrations.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can view the eventday.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\EventRegistration $registrations
     * @return mixed
     */
    public function view(User $user, EventRegistration $registrations)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can create eventday.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can update the eventday.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventRegistration $registrations
     * @return mixed
     */
    public function update(User $user, EventRegistration $registrations)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can delete the eventday.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventRegistration $registrations
     * @return mixed
     */
    public function delete(User $user, EventRegistration $registrations)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can view trashed registrations.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isSuperAdmin() || $user->hasPermissionTo('manage.registrations')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventRegistration $registrations
     * @return mixed
     */
    public function restore(User $user, EventRegistration $registrations)
    {
        return ($user->isSuperAdmin() || $user->hasPermissionTo('manage.registrations')) && $this->trashed($movie);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventRegistration $registrations
     * @return mixed
     */
    public function forceDelete(User $user, EventRegistration $registrations)
    {
        return ($user->isSuperAdmin()  || $user->hasPermissionTo('manage.registrations')) && $this->trashed($movie);
    }

    /**
     * Determine wither the given registrations is trashed.
     *
     * @param $eventday
     * @return bool
     */
    public function trashed($registrations)
    {
        return $this->hasSoftDeletes() && method_exists($registrations, 'trashed') && $registrations->trashed();
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
            array_keys((new \ReflectionClass(EventRegistration::class))->getTraits())
        );
    }
}
