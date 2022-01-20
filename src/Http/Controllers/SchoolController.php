<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function create(Request $request)
    {
        $validData = $this->validate($request, [
            'name'=>'required|unique:schools|alpha'
        ]);
        $entry = School::create($request->all());
        return response($entry);
    }
    public function all(Request $request)
    {
        $schools = School::all();
        return response($schools);
    }

    public function delete(Request $request)
    {
        $validData = $this->validate($request, [
            'id' => 'required|exists:schools'
        ]);
        $entry = School::find($validData['id']);
        $entry->delete();
        return response($entry);
    }
}