<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Hash;

class MemberController extends Controller
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
        $name=ucwords($request->firstname)." ".ucwords($request->lastname);
        Member::create([
            'name' => $name,
            // 'gender' => $request->male,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 0,
            'status' => "active",
        ]);

        return response()->json([
            'status'=> 201,
            'message'=> 'Registration successful.'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Member::find($id)->update([
            // '' => $request->,
        ]);
        return  response()->json([
            'status'=>'204',
            'message'=>'Record successfully updated.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }


    /**
     * Find the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
       $HashedPasswordCount=Member::where('email',$request->email)->count();
        $email= $request->email;
       $pass= $request->password;
       if($HashedPasswordCount== 0){
        return  response()->json([
            'status'=> '404',
            'message'=> 'Invalid login. Please try again.'
             ]);
       }
       if($HashedPasswordCount!=0){
           $HashedPassword=Member::where('email',$email)->get('password');
           $role=Member::where('email',$email)->get('role');
           $role=$role[0]['role'];
           $HashedPassword=$HashedPassword[0]['password'];
           $mID=Member::where('email',$email)->get('id');
           $mID=$mID[0]['id']; 
           if(Hash::check($pass, $HashedPassword))
           {
               return response()->json([
                'status'=>'200',
                'role'=>$role,
                'memberID'=>$mID,
                'message'=> 'Login Successful.'

               ]);
           }
           
       }
       
    }
}

