<?php

namespace App\Http\Controllers;


use App\Http\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class SignupController extends Controller
{
    public function signup()
    {
       $input =  Input::all();
        //dd($input);
        $rules = [
            'user_name'=>'required|between:5,20',
            'user_password'=>'required|between:6,20',
        ];
        $message = [
            'user_name.required'=>'用户名必须',
            'user_password.required'=>'密码必须',
            'user_name.between'=>'用户名必须在5-20位',
            'user_password.between'=>'密码必须在6-20位',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->fails()){
            return back()->withErrors($validator);
        }else{
            //存入数据库
            $userData = $input;
//            dd($userData);
//            exit;
            $user =  new \App\User();
            $user->user_name = $userData['user_name'];
            $user->user_password = Hash::make($userData['user_password']);
            //$user->fill($input);
            $user->save();
        }
    }
}
