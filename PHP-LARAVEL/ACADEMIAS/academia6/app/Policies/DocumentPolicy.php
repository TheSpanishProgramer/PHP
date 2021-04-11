<?php

namespace App\Policies;

use App\Subject;
use App\User;
use App\Document;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the document.
     *
     * @param  \App\User  $user
     * @param  \App\Document  $document
     * @return mixed
     */
    public function view(User $user, Document $document)
    {
        return isset($user->subjects()->where('subject_id', $document->subject->id)->get()[0]) || $user->id == $document->subject->user_id;
    }

    /**
     * Determine whether the user can create documents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Subject $subject)
    {
        return true;

        //return $user->hasRole('profesor') && $subject->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the document.
     *
     * @param  \App\User  $user
     * @param  \App\Document  $document
     * @return mixed
     */
    public function delete(User $user, Document $document)
    {
        return $user->hasRole('profesor') && $document->subject->user_id == $user->id;
    }
}
