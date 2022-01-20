<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'courses']]);
        $validData = $this->validate($request,[
            'program_id'=>'required|exists:programs,id',
            'name'=>'required|unique:courses',
            'code'=>'required|unique:courses'
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
            'id'=>'required|exists:courses'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'courses','target'=>$validData['id']]]);
        $entry = Course::find($validData['id']);
        $entry['program'] = $entry->program;
        return response($entry);
    }

    public function update(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:courses'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'courses','target'=>$validData['id']]]);
        $entry = Course::find($validData['id']);
        $entry->update($request->all());
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id'=>'required|exists:courses'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'courses','target'=>$validData['id']]]);
        $entry = Course::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}