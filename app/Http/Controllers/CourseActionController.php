<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseAction;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class CourseActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $operations = new CourseAction();
        $operations->student_id = $request->input('student_id');
        $operations->course_id = $request->input('course_id');
        $operations->save();
        return response()->json($operations);
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
            $data = DB::table("course_info")->get()->where("student_id",$id);
            return response()->json($data);
        }else{
            return response()->json(['error' => 'Student Has no courses']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dropcourse($student_id,$course_id)
    {
        /*$id = DB::select('id')->where('student_id',$student_id)->where('course_id',$course_id);
        $data = CourseAction::get()->where('student_id',$student_id)->where('course_id',$course_id);
        $data = CourseAction::get($id)
        $data->delete();
        return $this->response->json(["Success"=>"Deleted"]);*/

        // $id = DB::statement("select id from course_info where course_id =".$course_id." AND student_id=".$student_id);
        // return response()->json($id);
        $id = CourseAction::where('course_id',$course_id)->where('student_id',$student_id)->first()->id;
        $data = CourseAction::Find($id);
        $data->delete();
        return response()->json(['success' => 'Deleted']);
    }


}
