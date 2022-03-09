<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Observers\ClubObserver;
use App\Models\Club;

use App\Observers\MemberObserver;
use App\Models\Member;

use App\Observers\PaymentObserver;
use App\Models\Payment;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Club::observe(ClubObserver::class);
        Member::observe(MemberObserver::class);
        Payment::observe(PaymentObserver::class);
    }
}
