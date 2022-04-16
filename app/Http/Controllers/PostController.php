<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCount=Post::where('status','active')->count();
        $post=Post::where('status','active')->with('Topic','Member')->orderBy('created_at','desc')->get();
        $comment= Comment::where('status','active')->with('Member')->get();
        if($postCount>0){
            return response()->json([
                'status'=> 200,
                'data'=> $post,
                'commentData'=> $comment,
                'message'=>"Data found."
            ]);
        }
        elseif($postCount<1){
            return response()->json([
                'status'=> 404,
                'message'=>"No data found."
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        // return $image;
        $id=Topic::create([
            'categoryID' => $request->categoryID,
            'name' => $request->heading,
            'status'=>'active'
        ])->id;

        //NOTE... replace 1 with the darn memberID
        Post::create([
            'memberID' => 1,
            'topicID' => $id,
            'body' => $request->contents,
            'image' => $image,
            'status' => 'active'

        ]);
        return response()->json([
                'status'=> 201,
                'message'=> 'Post created successfully.'
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Post::where('id',$id)->with('Topic')->get();
        $categoryID=$data[0]['topic']['categoryID'];
        $categoryData=Category::find($categoryID);
        $categoryRecords=Category::where('status','active')->get();
        return  response()->json([
            'status'=>'200',
            'data'=>$data,
            'category'=>$categoryData,
            'categoryRecords'=>$categoryRecords,
            'message'=>'Found data' 
        ]);
    }
//
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Post::find($id)->update([
            'body' => $request->contents,
            'image' => $request->photo,
        ]);
    //    $categoryName=Category::where('id',$request->categoryID)->get('name');
       Topic::where('id',$request->topicID)->update([
            'name' => $request->heading,
            'categoryID' => $request->categoryID
        ]);
        return  response()->json([
            'status'=>'204',
            'message'=>'Record successfully updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Post::find($id)->update([
            'status' => "inactive"
        ]);
        return  response()->json([
            'status'=>'204',
            'message'=>'Post successfully deleted.'
        ]);
    }
}
