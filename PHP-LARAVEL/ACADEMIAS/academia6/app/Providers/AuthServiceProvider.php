<?php

namespace App\Providers;

use App\Document;
use App\Policies\DocumentPolicy;
use App\Policies\PostPolicy;
use App\Policies\SubjectPolicy;
use App\Post;
use App\Subject;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Document::class => DocumentPolicy::class,
        Subject::class => SubjectPolicy::class,
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
