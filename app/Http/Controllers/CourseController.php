<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
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
        $courses = new Course();
        $courses->course_name = $request->input('course_name');
        $courses->credits = $request->input('credits');
        $courses->save();
        return response()->json($courses);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validate = Course::find($id);
        if($validate){
            $courses = Course::find($id);
            return response()->json($courses);
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
        $validate = Course::find($id);
        if($validate){
            $data = Course::Find($id);
            $data->course_name = $request->input('course_name');
            $data->credits = $request->input('credits');
            $data->save();
            $courses = Course::find($id);
            return response()->json($courses);
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
        $data = Course::Find($id);
        $data->delete();
        return $this->index();
    }
}
