<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name'
    ];
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}