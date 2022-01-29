<?php
namespace Fshangala\Faculty\Listeners;

use Fshangala\Faculty\Events\ProfileWasCreated;

class UpdateProfile
{
    public function handle(ProfileWasCreated $event)
    {
        $event->profile->update(["last_name"=>"updated"]);
    }
}