<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;
use Fshangala\Faculty\Models\Profile;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable = [
        'id',
        'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}