<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\IngredientsQuantities;
use App\Models\User;

class IngredientsQuantitiesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, IngredientsQuantities $ingredientsQuantities): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, IngredientsQuantities $ingredientsQuantities): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, IngredientsQuantities $ingredientsQuantities): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, IngredientsQuantities $ingredientsQuantities): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, IngredientsQuantities $ingredientsQuantities): bool
    {
        return false;
    }
}
