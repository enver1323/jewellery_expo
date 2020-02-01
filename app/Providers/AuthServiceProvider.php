<?php

namespace App\Providers;

use App\Domain\Badge\Entities\Badge;
use App\Domain\Badge\Policies\BadgePolicy;
use App\Domain\Visa\Entities\Visa;
use App\Domain\Visa\Policies\VisaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Visa::class => VisaPolicy::class,
        Badge::class => BadgePolicy::class
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
