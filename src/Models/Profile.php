<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;
use Fshangala\Auth2Ation\Models\User;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'gender',
        'dob',
        'nic',
        'country',
        'city',
        'address',
        'type',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}