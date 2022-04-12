<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // function index(Request $request){
    //     $email= $request->email;
    //     $pass= $request->password;

    //     $pHashedPasswordCount=parents::where('email',$email)->count();
    //     $cHashedPasswordCount=canteenStaff::where('email',$email)->count();
    //     $uHashedPasswordCount=User::where('email',$email)->count();

    //     if($pHashedPasswordCount== 0 && $cHashedPasswordCount== 0 && $uHashedPasswordCount== 0){
    //         return $res=array(
    //             'status'=>'404',
    //             'userType'=>'not found',
    //         ); 
    //     }
    //     if($pHashedPasswordCount!=0){
    //         $pHashedPassword=parents::where('email',$email)->get('password');
    //         $pHashedPassword=$pHashedPassword[0]['password'];
    //         $pID=parents::where('email',$email)->get('id');
    //         $pID=$pID[0]['id']; 
            
    //         if(Hash::check($pass, $pHashedPassword))
    //         {
    //             $res=array(
    //                 'status'=>'200',
    //                 'userType'=>'parent',
    //                 'userID'=>$pID
    //             );
    //             return $res;
    //         }
    //     }

    //     if($cHashedPasswordCount!=0){
    //         $cHashedPassword=canteenStaff::where('email',$email)->get('password');
    //         $cHashedPassword=$cHashedPassword[0]['password'];
    //         $cID=canteenStaff::where('email',$email)->get('id');
    //         $cStatus=canteenStaff::where('email',$email)->get('status');
    //         $cID=$cID[0]['id'];
    //         $cStatus = $cStatus[0]['status'];
        
    //         if(Hash::check($pass, $cHashedPassword))
    //     {
    //         $res=array(
    //             'status'=>'200',
    //             'userType'=>'canteenStaff',
    //             'userID'=>$cID,
    //             'cStatus'=>$cStatus
    //         );
    //         return $res;
    //     }
            
    //     }

    //     if($uHashedPasswordCount!=0){
    //         $uHashedPassword=User::where('email',$email)->get('password');
    //         $uHashedPassword=$uHashedPassword[0]['password'];
    //         $uID=User::where('email',$email)->get('id');
    //         $uID=$uID[0]['id'];

    //         if(Hash::check($pass, $uHashedPassword))
    //         {
    //             $res=array(
    //                 'status'=>'200',
    //                 'userType'=>'user',
    //                 'userID'=>$uID
    //             );
    //             return $res;

    //         }
    //     }
        
    //     $failed = array(
    //         'status'=> '404',
    //         'message'=> 'Credentials does not match our records'
    //     );
    //     return $failed;
    // }
}
