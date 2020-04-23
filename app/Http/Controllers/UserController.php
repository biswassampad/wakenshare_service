<?php

namespace App\Http\Controllers;
use App\User;
use App\SearchList;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client;

class UserController extends Controller
{
   public function createUser(Request $request){
       $time = \Carbon\Carbon::now()->toDateTimeString();
       $user = User::create([
        'fullname'=>$request['fullname'],
        'email'=>$request['email'],
        'password'=>Hash::make($request['password']),
        'user_id'=>$request['user_id'],
        'created_at'=>$time,
        'updated_at'=>$time 
       ]);
       return response()->json($user);
   }

   public function getUserDetails(Request $request){
       $email = $request['email'];
       $user = User::where('email',$email)->get();

       return response()->json($user);
   }    
}
