<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Member;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        Comment::create([
            'memberID' => $request->memberID,
            'postID' => $request->postID,
            'body' => $request->comment,
            'status' => "active",
        ]);
        $total=Comment::where('postID',$request->postID)->where('status','active')->count();
                //comment count update
            Post::where('id',$request->postID)->update([
                'totalComments' => $total 
            ]);
        return  response()->json([
            'status'=>'201',
            'message'=>'Comment created Sucessfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Comment::find($id);
        return  response()->json([
            'status'=>'200',
            'data'=>$data,
            'message'=>'Found data'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Comment::where('id',$id)->where('memberID',$request->memberID)->update([
            'body'=> $request->comment
        ]);
        return response()->json([
            'status'=>'204',
            'message'=>'comment successfully updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // return $request;
       Comment::where('id',$id)->update([
           'status'=> "inactive"
       ]);

       $c = Post::where('id',$request->postID)->get('totalComments');
       $count =  $c[0]['totalComments'];
       $total = $count - 1;
        Post::where('id',$request->postID)->update([
            'totalComments' => $total 
        ]);
        return  response()->json([
            'status'=>'204',
            'message'=>'Comment successfully deleted.'
        ]);
    }
}
