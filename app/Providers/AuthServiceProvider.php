<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Company;
use App\Models\Project;
use App\Models\Task;
use App\Policies\CompanyPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\TAskPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected$policies = [
        Company::class => CompanyPolicy::class,
        Project::class => ProjectPolicy::class,
        Task::class    => TaskPolicy::class
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
