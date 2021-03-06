<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        EmployeeAdded::class => [SendEmployeeCredential::class],
        EmailChanged::class => [SendEmployeeNewEmailMail::class],
        RestaurantAdded::class => [SendRestaurantCredential::class],
        OrganizationAdded::class => [SendOrganizationCredential::class],
        ManagerAdded::class => [SendManagerCredential::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
