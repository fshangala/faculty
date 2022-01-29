<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'code',
        'program_id',
        'name',
        'year',
        'semester'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}