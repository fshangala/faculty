<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'schools']]);
        $this->validate($request, [
            'name'=>'required|unique:schools'
        ]);
        $entry = School::create($request->all());
        return response($entry);
    }

    public function all(Request $request)
    {
        $this->authorize('permission',[['action'=>'read','resource'=>'schools']]);
        $schools = School::all();
        return response($schools);
    }

    public function get(Request $request)
    {
        $validData = $this->validate($request, [
            'id'=>'required|exists:schools'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'schools','target'=>$validData['id']]]);
        $entry = School::find($validData['id']);
        $entry['programs'] = $entry->programs;

        return response($entry);
    }

    public function update(Request $request)
    {
        $validData = $this->validate($request, [
            'name'=>'required|unique:schools',
            'id'=>'required|exists:schools'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'schools','target'=>$validData['id']]]);
        $entry = School::find($validData['id']);
        $entry->update($validData);
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id' => 'required|exists:schools'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'schools','target'=>$validData['id']]]);
        $entry = School::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}