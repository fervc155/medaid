<?php

namespace App\Policies;

use App\User;
use App\Doctor;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the doctor.
     *
     * @param  \App\User  $user
     * @param  \App\Doctor  $doctor
     * @return mixed
     */
    public function view(User $user, Doctor $doctor)
    {
  
    }

    /**
     * Determine whether the user can create doctors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the doctor.
     *
     * @param  \App\User  $user
     * @param  \App\Doctor  $doctor
     * @return mixed
     */
    public function update(User $user, Doctor $doctor)
    {

 

        return true;
    }



    /**
     * Determine whether the user can delete the doctor.
     *
     * @param  \App\User  $user
     * @param  \App\Doctor  $doctor
     * @return mixed
     */
    public function delete(User $user, Doctor $doctor)
    {
        //
    }

    /**
     * Determine whether the user can restore the doctor.
     *
     * @param  \App\User  $user
     * @param  \App\Doctor  $doctor
     * @return mixed
     */
    public function restore(User $user, Doctor $doctor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the doctor.
     *
     * @param  \App\User  $user
     * @param  \App\Doctor  $doctor
     * @return mixed
     */
    public function forceDelete(User $user, Doctor $doctor)
    {
        //
    }
}
