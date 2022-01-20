<?php
namespace Fshangala\Faculty\Http\Controllers;

use App\Http\Controllers\Controller;
use Fshangala\Faculty\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function all(Request $request)
    {
        $schools = School::all();
        return response($schools);
    }
}