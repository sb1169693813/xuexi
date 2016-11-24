<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function(){
    //return 'get请求';
     //$user = \App\User::findOrFail(10);
    $user = new \App\User();
    return $user->all();
});
Route::get('mywelcome','MyWelcomeController@Index');
Route::get('user',function(){
    $user = new \App\User();
//    return $user->all();
//    $user->user_name ='jing';
//    $user->age = 90;
    //填充数组
    $data = [
        'user_name'=>'bo',
        'age'=>20,
    ];
    $user->fill($data);
    $user->save();
    return $user->all();
    //return $user->where('user_id','>','1')->get();
});
//改路由
Route::get('userUpdate',function(){
     $user = new \App\User();
    $user->userUpdate();
    return $user->userRead();
});
//删路由
Route::get('userDelete',function(){
    $user = new \App\User();
    $user->userDelete();
    return $user->userRead();
});
//加路由
Route::get('userAdd',function(){
    $user = new\App\User();
    $user->userAdd();
    return $user->all();
});
//集合
Route::get('collection',function(){
//    $user = new \App\User();
    //对 Eloquent 中获取多个结果的方法（比如 all 和 get ）而言，其返回值是
    //Illuminate\Database\Eloquent\Collection 的一个实例
//    $users = $user->all();
    //集合
    //dd($users); //var_dump() and die()
    //数组
    //return $users->all();

    $data = ['one'=>'1','two','three'];
    $colletion= collect($data);
    //数组
    //dd($data);
    //集合
    //dd($colletion);
    //数组
   // return $colletion->all();

    //检测集合
    //检测集合值
    //$r = $colletion->contains('one');
    //检测集合建
    //$r = $colletion->has('one');
//    echo $r;
    //集合
//    $take = $colletion->take(2);
//    dd($take);

    //数据库中的集合
    $user = new \App\User();
    $users = $user->all();
    dd($users);
    //
//    $users->chunk(100,function($data){
//        foreach($data as $d){
//
//        }
//    });
});

//get请求路由
Route::get('input',function(){
    //get
//    return \Illuminate\Support\Facades\Input::all();
        //不行
//    $request = new \App\Http\Requests\Request();
//    return $request->request();
});

//post请求路由
Route::get('form',function(){
    return view('form');
});
Route::any('formtest',function (){
    return  \Illuminate\Support\Facades\Input::all();
});