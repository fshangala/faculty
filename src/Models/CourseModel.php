<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillables = [
        'program_id',
        'name',
        'code'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}