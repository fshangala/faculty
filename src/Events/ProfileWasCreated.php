<?php
namespace Fshangala\Faculty\Events;

use Illuminate\Queue\SerializesModels;
use Fshangala\Faculty\Models\Profile;

class ProfileWasCreated
{
    use SerializesModels;
    public $profile;
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }
}