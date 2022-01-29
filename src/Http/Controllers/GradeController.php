<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\Course;
use Fshangala\Faculty\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function registerCourse(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'grades']]);
        $validData = $this->validate($request,[
            'student_id'=>'required|exists:students,id',
            'course_code'=>'required|exists:courses,code'
        ]);
        $validData['status'] = 'pending';
        $entry = Grade::create($validData);
        return response($entry);
    }

    public function all()
    {
        $this->authorize('permission',[['action'=>'read','resource'=>'grades']]);
        $entries = Grade::all();
        return response($entries);
    }

    public function get(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:grades'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'grades','target'=>$validData['id']]]);
        $entry = Grade::find($validData['id']);
        $entry['student'] = $entry->student;
        return response($entry);
    }

    public function getStudentGrades(Request $request)
    {
        $validData = $this->validate($request,[
            'student_id'=>'required|exists:students,id'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'grades','type'=>$validData['student_id']]]);
        $entry = Grade::where('student_id',$validData['student_id'])->get();
        return response($entry);
    }

    public function update(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:grades'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'grades','target'=>$validData['id']]]);
        $entry = Grade::find($validData['id']);
        $entry->update($request->all());
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id'=>'required|exists:grades'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'grades','target'=>$validData['id']]]);
        $entry = Grade::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}