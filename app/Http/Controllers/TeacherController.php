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
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'institute' => 'required'
        ]);
        $data = Teacher::insert([
            'name' => $request->name,
            'title' => $request->title,
            'institute' => $request->institute
        ]);

        return response()->json($data);
    }

    public function edit($id){
        $data = Teacher::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'institute' => 'required'
        ]);
        
        $data = Teacher::findOrFail($id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'institute' => $request->institute
        ]);
        return response()->json($data);
    }
}
