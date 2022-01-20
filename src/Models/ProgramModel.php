<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillables =[
        'school_id',
        'name',
        'short_name'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}