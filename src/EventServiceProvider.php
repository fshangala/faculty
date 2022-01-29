<?php
namespace Fshangala\Faculty;

use Fshangala\Faculty\Events\ProfileWasCreated;
use Fshangala\Faculty\Listeners\UpdateProfile;
use Illuminate\Events\EventServiceProvider as EServiceProvider;

class EventServiceProvider extends EServiceProvider
{
    protected $listen = [
        ProfileWasCreated::class => [
            UpdateProfile::class
        ],
    ];

}