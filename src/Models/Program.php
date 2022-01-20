<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable =[
        'school_id',
        'name',
        'short_name'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}