<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;
use Fshangala\Faculty\Models\Profile;

class Student extends Model
{
    protected $fillable = [
        'id',
        'profile_id',
        'intake_year',
        'intake_month',
        'program_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}