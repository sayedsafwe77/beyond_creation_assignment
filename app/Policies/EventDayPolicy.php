<?php

namespace App\Policies;

use App\Models\EventDay;
use App\Models\User;

class EventDayPolicy
{
    /**
     * Determine whether the user can view any eventdays.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.eventdays');
    }

    /**
     * Determine whether the user can view the eventday.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Product $product
     * @return mixed
     */
    public function view(User $user, EventDay $eventday)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.eventdays');
    }

    /**
     * Determine whether the user can create eventday.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.eventdays');
    }

    /**
     * Determine whether the user can update the eventday.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventDay $eventday
     * @return mixed
     */
    public function update(User $user, EventDay $eventday)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.eventdays');
    }

    /**
     * Determine whether the user can delete the eventday.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventDay $eventday
     * @return mixed
     */
    public function delete(User $user, EventDay $eventday)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('manage.eventdays');
    }

    /**
     * Determine whether the user can view trashed eventdays.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isSuperAdmin() || $user->hasPermissionTo('manage.eventdays')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\EventDay $eventday
     * @return mixed
     */
    public function restore(User $user, EventDay $eventday)
    {
        return ($user->isSuperAdmin() || $user->hasPermissionTo('manage.eventdays')) && $this->trashed($eventday);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\eventday $eventday
     * @return mixed
     */
    public function forceDelete(User $user, EventDay $eventday)
    {
        return ($user->isSuperAdmin()  || $user->hasPermissionTo('manage.eventdays')) && $this->trashed($eventday);
    }

    /**
     * Determine wither the given eventday is trashed.
     *
     * @param $eventday
     * @return bool
     */
    public function trashed($eventday)
    {
        return $this->hasSoftDeletes() && method_exists($eventday, 'trashed') && $eventday->trashed();
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
            array_keys((new \ReflectionClass(EventDay::class))->getTraits())
        );
    }
}
