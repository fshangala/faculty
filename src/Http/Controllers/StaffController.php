<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function create(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'staffs']]);
        $validData = $this->validate($request,[
            'id'=>'required|unique:staffs',
            'profile_id'=>'required|exists:profiles,id|unique:staffs'
        ]);
        $entry = Staff::create($validData);
        return response($entry);
    }

    public function all()
    {
        $this->authorize('permission',[['action'=>'read','resource'=>'staffs']]);
        $entries = Staff::all();
        return response($entries);
    }

    public function get(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:staffs'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'staffs','target'=>$validData['id']]]);
        $entry = Staff::find($validData['id']);
        $entry['profile'] = $entry->profile;
        return response($entry);
    }

    public function update(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:staffs'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'staffs','target'=>$validData['id']]]);
        $entry = Staff::find($validData['id']);
        $entry->update($request->all());
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id'=>'required|exists:staffs'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'staffs','target'=>$validData['id']]]);
        $entry = Staff::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}