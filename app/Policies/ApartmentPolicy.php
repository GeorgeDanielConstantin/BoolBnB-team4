<?php

namespace App\Policies;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;


class ApartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user, Apartment $apartment)
    {
        // try {
        //     $this->authorize('viewAny', User::class);
        // } catch (AuthorizationException $e) {
        //     return response('Not Authorized!', 403);
        // }

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Apartment $apartment)
    {
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
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Apartment $apartment)
    {
        // $action = Route::current();
        // dd($action->uri() == 'admin/apartments/{apartment}');
        // if ($action->uri() == 'admin/apartments')
        return $user->id === $apartment->user_id
            ? Response::allow()
            : Response::deny('You do not own this Apartment.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Apartment $apartment)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Apartment $apartment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Apartment $apartment)
    {
        //
    }
}
