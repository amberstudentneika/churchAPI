<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCount=Category::where('status','active')->count();
        $data=Category::where('status','active')->get();

        if($dataCount>0){
        return response()->json([
            'status'=>'200',
            'data'=> $data,
            'message'=>'Data found'
        ]);
        }elseif($dataCount<1){
        return response()->json([
            'status'=>'404',
            'message'=>'No data found'
        ]);
        }
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
        Category::create([
            'name'=>ucwords($request->heading),
            'desc'=>ucfirst($request->detail),
            'status'=>'active'
        ]);

        return  response()->json([
            'status'=>'201',
            'message'=>'Category created Sucessfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Category::find($id);
        return  response()->json([
            'status'=>'200',
            'data'=>$data,
            'message'=>'Found data'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=Category::find($id)->update([
            'name' => $request->heading,
            'desc' => $request->detail
        ]);
        return  response()->json([
            'status'=>'204',
            'message'=>'Record successfully updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Category::find($id)->delete();
        return  response()->json([
            'status'=>'204',
            'message'=>'Category successfully deleted.'
        ]);
    }
}
