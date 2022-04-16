<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCount=Announcement::where('status','active')->count();
        $data=Announcement::where('status','active')->get();
//
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
        if($request->photo==""){
            $image = "no image";
        }elseif($request->photo!=null){
            $image = $request->photo;
        }
        Announcement::create([
            'memberID'=> $request->memberID,
            'topic'=> $request->heading,
            'message'=> $request->contents,
            'image'=> $image,
            // 'admin'=>'active',
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
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
