<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCount=Like::where('status','active')->count();
        $likesData=Like::where('status','active')->get();

        if($dataCount>0){
        return response()->json([
            'status'=>'200',
            'data'=> $likesData,
            'message'=>'Data found'
        ]);
        }elseif($dataCount<1){
        return response()->json([
            'status'=>'404',
            'message'=>'No data found'
        ]);
        }

        return response()->json([
            'status'=>'404',
            'message'=>'No data found'
        ]);
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
        $dislike=Like::where('memberID',$request->memberID)->where('postID',$request->postID)->count();
         if($dislike==1){
            Like::where('postID',$request->postID)->where('memberID',$request->memberID)->delete();
            $total=Like::where('postID',$request->postID)->count();
                //likes count update
            Post::where('id',$request->postID)->update([
                'totalLikes' => $total 
            ]);
            return  response()->json([
                'status'=>'201',
                'message'=>'like removed Sucessfully'
            ]);
        }elseif($dislike==0){
            Like::create([
                'memberID' => $request->memberID,
                'postID' => $request->postID,
                'like' => 1,
                'status' => "active",
            ]);
            $total=Like::where('postID',$request->postID)->count();
                //likes count update
            Post::where('id',$request->postID)->update([
                'totalLikes' => $total 
            ]);
            return  response()->json([
                'status'=>'201',
                'message'=>'Category created Sucessfully'
            ]);
        }

        
       
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
