<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Validator;

class CourseController extends Controller
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
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'course_name' => 'required|string', 
             'course_code' => 'required|integer',
         
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $course = new course;

        $course->course_name = $request->course_name;
        $course->course_code=$request->course_code;
        
        if($course->save()){
            return response()->json(['success'=>"course created successfully !"], 200);
        }else{
            return response()->json(['error'=>"course creation unsuccessful !"], 400);
        }  
    }
    public function getcourse($id)
    {
        $course = Course::where('id',$id)->first();
    if($course) return response()->json($course, 200);

    return response()->json(['error'=>"No user found !"], 200); 
    }
    
    public function courseupdate(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'course_name' => 'required|string', 
            'course_code' => 'required|integer'
        
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $course = new Course;
        $course = course::find($request->id);
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        if($course->save()){
            return response()->json(['success'=>"course update successfully !"], 200);
        }else{
            return response()->json(['error'=>"course update unsuccessful !"], 400);
        }
      

    }
    public function coursedelete($id)
    {
        $delete = Course::where('id',$id)->delete();
        if($delete){
         return response()->json(['success'=>' delete successfully'],200); 
        }else{
         return response()->json(['error'=>" data AllReady deleted !"], 400); 
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
