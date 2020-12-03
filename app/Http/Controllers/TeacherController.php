<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(){
        return view('teacher.index');
    }

    public function allData(){
        $data = Teacher::orderBy('id','DESC')->get();

        return response()->json($data);
    }

    public function store(Request $request){
        $data = Teacher::insert([
            'name' => $request->name,
            'title' => $request->title,
            'institute' => $request->institute
        ]);

        return response()->json($data);
    }
}
