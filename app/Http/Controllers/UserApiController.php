<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\usermodel;
use App\Mail\forgetmail;
use Mail;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }


    public function register(Request $req){
        $rules = array(
            'email' => 'unique:users|required',
            'name' => 'required',
            'password' => 'required|min:8|confirmed',

        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
       $store =  new usermodel;
       $store->name = $req->name;
       $store->email = $req->email;
       $store->password = Hash::make($req->password);
       $store->save();
       return response()->json(['status' => 'user insertion completed']);
        }
    }

    public function forgetapi(Request $request){
        $checkemail = usermodel::where('email',$request->email)->first();
        if($checkemail){
        $mailData = [
            'title' => 'forget password',
            'body' => 'your change code is',
            'code' => $request->code,


        ];
        Mail::to($request->email)->send(new forgetmail($mailData));
        return response()->json(["Status" => "Email Send Successfully"]);

    }else{
        return response()->json(["Status" => "Email not found"]);
    }
    }

    public function updatepassworc(Request $request){
        $email = usermodel::where('email',$request->email)->first();
        if($email){
       
       $email->password = Hash::make($request->password);
       $email->pass = $request->password;

       $email->update();
        return response()->json(["Status" => "Password Reset Successfully"]);

    }else{
        return response()->json(["Status" => "Email not found"]);
    }
    }
}
