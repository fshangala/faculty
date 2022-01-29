<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Events\ProfileWasCreated;
use Fshangala\Faculty\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(Request $request)
    {
        $this->authorize('permission',[['action'=>'create','resource'=>'profiles']]);
        $validData = $this->validate($request,[
            'user_id'=>'required|exists:users,id|unique:profiles',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'nic'=>'required',
            'country'=>'required',
            'city'=>'required',
            'address'=>'required',
            'type'=>'required'
        ]);
        $validData['status']='pending';
        $entry = Profile::create($validData);
        event(new ProfileWasCreated($entry));
        return response($entry);
    }

    public function all()
    {
        $this->authorize('permission',[['action'=>'read','resource'=>'profiles']]);
        $entries = Profile::all();
        return response($entries);
    }

    public function get(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:profiles'
        ]);
        $this->authorize('permission',[['action'=>'read','resource'=>'profiles','target'=>$validData['id']]]);
        $entry = Profile::find($validData['id']);
        $entry['user'] = $entry->user;
        $entry['student'] = $entry->student;
        $entry['staff'] = $entry->staff;
        return response($entry);
    }

    public function getUserProfile(Request $request)
    {
        $entry = Profile::where('user_id',$request->user()->id)->firstOrFail();
        $this->authorize('permission',[['action'=>'read','resource'=>'profiles','target'=>$entry->id]]);
        $entry['user'] = $entry->user;
        $entry['student'] = $entry->student;
        $entry['staff'] = $entry->staff;
        return response($entry);
    }

    public function update(Request $request)
    {
        $validData = $this->validate($request,[
            'id'=>'required|exists:profiles'
        ]);
        $this->authorize('permission',[['action'=>'update','resource'=>'profiles','target'=>$validData['id']]]);
        $entry = Profile::find($validData['id']);
        $entry->update($request->all());
        return response($entry);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id'=>'required|exists:profiles'
        ]);
        $this->authorize('permission',[['action'=>'delete','resource'=>'profiles','target'=>$validData['id']]]);
        $entry = Profile::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}