<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserRegistered' => [
            'App\Listeners\Registration\SendConfirmationEmail',
            'App\Listeners\Registration\NotifyPoolAdmin',
            'App\Listeners\Registration\ClearUserDropDownCache',
        ],
        'App\Events\UserRequestedResetPasswordLink' => [
            'App\Listeners\SendPasswordResetEmail'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
