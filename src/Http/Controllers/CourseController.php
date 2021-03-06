<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'courses']]);
        $validData = $this->validate($request,[
            'program_id'=>'required|exists:programs,id',
            'name'=>'required|unique:courses',
            'code'=>'required|unique:courses',
            'year'=>'required',
            'semester'=>'required'
        ]);
        $entry = Course::create($validData);
        return response($entry);
    }

    public function all()
    {
        $this->authorize('permission',[['action'=>'read','resource'=>'courses']]);
        $entries = Course::all();
        return response($entries);
    }

    public function get(Request $request)
    {
        $validData = $this->validate($request,[
            'code'=>'required|exists:courses'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'courses','target'=>$validData['code']]]);
        $entry = Course::where('code',$validData['code'])->first();
        $entry['program'] = $entry->program;
        return response($entry);
    }

    public function update(Request $request)
    {
        $validData = $this->validate($request,[
            'code'=>'required|exists:courses'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'courses','target'=>$validData['code']]]);
        $entry = Course::where('code',$validData['code'])->first();
        $entry->update($request->all());
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'code'=>'required|exists:courses'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'courses','target'=>$validData['code']]]);
        $entry = Course::where('code',$validData['code'])->first();
        $entry->delete();
        return response($entry);
    }
}