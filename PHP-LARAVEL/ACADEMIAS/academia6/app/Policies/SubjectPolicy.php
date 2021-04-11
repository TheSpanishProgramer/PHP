<?php

namespace App\Policies;

use App\Subject;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubjectPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->hasRole('admin')) {
            return true;
        }
    }

    public function view(User $user, Subject $subject)
    {
        return isset($user->subjects()->where('subject_id', $subject->id)->get()[0]) || $subject->user_id === $user->id;
    }

    public function edit(User $user, Subject $subject)
    {
        return $subject->user_id === $user->id;
    }
}
