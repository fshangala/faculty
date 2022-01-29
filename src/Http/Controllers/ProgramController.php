<?php

namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'programs']]);
        $validData = $this->validate($request,[
            'school_id'=>'required|exists:schools,id',
            'name'=>'required|unique:programs',
            'short_name'=>'required|unique:programs'
        ]);
        $entry = Program::create($validData);
        return response($entry);
    }
    
    public function all(Request $request)
    {
        $this->authorize('permission',[['action'=>'read','resource'=>'programs']]);
        $entries = Program::all();
        return response($entries);
    }

    public function get(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:programs'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'programs','target'=>$validData['id']]]);
        $entry = Program::find($validData['id']);
        $entry['school'] = $entry->school;
        $entry['courses'] = $entry->courses;
        return response($entry);
    }

    public function getUserProgram(Request $request)
    {

    }

    public function update(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:programs'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'programs','target'=>$validData['id']]]);
        $entry = Program::find($validData['id']);
        $entry->update($request->all());
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id'=>'required|exists:programs'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'programs','target'=>$validData['id']]]);
        $entry = Program::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}