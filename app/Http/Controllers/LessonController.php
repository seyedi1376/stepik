<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons=Lesson::all();
        //$lessons = Lesson::where('deleted', 0)->with('group')->get();
        return response()->json($lessons,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lessons = Lesson::create($request->all());
        return response()->json($lessons, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return response()->json($lesson, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson= Lesson::find($id);
        $lesson->title =$request->input('title') ;
        $lesson-> code=$request->input('code') ;
        $lesson-> price=$request->input('price');
        $lesson-> score=$request->input( 'score');
        $lesson->description =$request->input('description') ;
        $lesson->showToUser =$request->input('showToUser') ;

        $lesson ->  save();
        return response()->json($lesson, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id)->delete();
        if(!$lesson){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['message'=>'deleted successfully'], 200);
    }
}
