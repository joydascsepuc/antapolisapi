<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Student();
        $students->name = $request->input('name');
        $students->mobile_no = $request->input('mobile_no');
        $students->email = $request->input('email');
        $students->save();
        return response()->json($students);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validate = Student::find($id);
        if($validate){
            $students = Student::find($id);
            return response()->json($students);
        }else{
            return response()->json(['error' => 'There is no ID available to show']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Student::find($id);
        if($validate){
            $data = Student::Find($id);
            $data->name = $request->input('name');
            $data->mobile_no = $request->input('mobile_no');
            $data->email = $request->input('email');
            $data->save();
            $students = Student::find($id);
            return response()->json($students);
        }else{
            return response()->json(['error' => 'There is no ID available to update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::Find($id);
        $data->delete();
        return $this->index();
    }
}
