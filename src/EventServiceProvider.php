<?php
namespace Fshangala\Faculty;

use Fshangala\Faculty\Events\ProfileWasCreated;
use Fshangala\Faculty\Listeners\UpdateProfile;
use Laravel\Lumen\Providers\EventServiceProvider as EServiceProvider;

class EventServiceProvider extends EServiceProvider
{
    protected $listen = [];

}