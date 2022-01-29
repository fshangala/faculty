<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\Profile;
use Fshangala\Faculty\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'students']]);
        $validData = $this->validate($request,[
            'id'=>'required|unique:students',
            'profile_id'=>'required|exists:profiles,id|unique:students',
            'intake_year'=>'required',
            'intake_month'=>'required',
            'program_id'=>'required|exists:programs,id'
        ]);
        $entry = Student::create($validData);
        return response($entry);
    }

    public function all()
    {
        $this->authorize('permission',[['action'=>'read','resource'=>'students']]);
        $entries = Student::all();
        return response($entries);
    }

    public function get(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:students'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'students','target'=>$validData['id']]]);
        $entry = Student::find($validData['id']);
        $entry['profile'] = $entry->profile;
        $entry['program'] = $entry->program;
        return response($entry);
    }

    public function update(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:students'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'students','target'=>$validData['id']]]);
        $entry = Student::find($validData['id']);
        $entry->update($request->all());
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id'=>'required|exists:students'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'students','target'=>$validData['id']]]);
        $entry = Student::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}