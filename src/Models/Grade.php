<?php
namespace Fshangala\Faculty\Models;

use Illuminate\Database\Eloquent\Model;
use Fshangala\Faculty\Models\Profile;

class Grade extends Model
{
    protected $fillable = [
        'student_id',
        'course_code',
        'ca',
        'exam',
        'grade',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}