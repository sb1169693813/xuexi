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
   // dd($colletion->all());

//    $data = [1, 2, 3, 4, 5, 6, 7];
//    $colletion= collect($data);
//   // return $colletion->avg();
//    $chunks = $colletion->chunk(4);
//    return $chunks->toArray();

    //collapse 方法将一个多维数组集合收缩成一个一维数组：
    $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
    //$co = $collection->toArray();
    $co  = $collection->collapse();
   // return $co;

    //contains 方法判断集合是否包含一个给定项：
    $collection2 = collect(['name' => 'Desk', 'price' => 100]);
    //return $collection2->contains('price') == true ? 'yes' : 'no' ;
    //你还可以传递一个键值对到  contains 方法，这将会判断给定键值对是否存在于集合中：(多维数组)
    $collection3 = collect([
        ['name' => 'Desk', 'price' => 100],
        ['name' => 'Phone', 'price' => 200]
    ]);
        //dd($collection3->contains('name','Phone'));

    //count 方法返回集合中所有项的数目：
    $collection4 = collect(['name' => 'Desk', 'price' => 100]);
    //dd($collection4->count());

    //diff 方法将集合和另一个集合或原生 PHP 数组作比较
    $collection5 = collect([1, 2, 3, 4, 5]);
    $diff = $collection5->diff([2,4,5,7,8]);
    //return $diff->all();//第一个数组中有哪些值不一样

    //each 方法迭代集合中的数据项并传递每个数据项到给定回调
    $collection6 = collect([2,4,5,7,8]);
    $collection6->each(function($key,$value){
       // dd($key);//不懂
    });

    //filter 方法通过给定回调过滤集合，只有通过给定测试的数据项才会保留下来：
    $collection7 = collect([1, 2, 3, 4, 5]);
     $filter= $collection7->filter(function($item){
        return $item > 2;
    });
    //return $filter->all();

    //first 方法返回通过测试集合的第一个元素
    $collection8 = collect([1, 2, 3, 4, 5]);
    $first =  $collection8->first(function($key,$item){
        return $item > 2;
    });
   // return $first;

    //flatten 方法将多维度的集合变成一维的：
    $collection9 = collect(['name' => 'taylor', 'languages' => ['php', 'javascript']]);
    // return $collection9->flatten();

    //flip 方法将集合的键值做交换：
    $collection10 = collect(['name'=>'sun','age'=>11,'height'=>175]);
    //return $collection10->flip();

    //forPage 方法返回新的包含给定页数数据项的集合：
    $collection11 = collect([1, 2, 3, 4, 5, 6, 7, 8, 9])->forPage(2, 3);
    //dd($collection11->all());


    //get 方法返回给定键的数据项，如果不存在，返回 null：
    $collection12 = collect(['name' => 'taylor', 'framework' => 'laravel']);
    $value = $collection12->get('name');
//    dd($value);

    //groupBy 方法通过给定键分组集合数据项：
    $collection13 = collect([
        ['account_id' => 'account-x10', 'product' => 'Chair'],
        ['account_id' => 'account-x10', 'product' => 'Bookcase'],
        ['account_id' => 'account-x11', 'product' => 'Desk'],
    ]);
    //dd($collection13->groupBy('account_id')->toArray());

    //has 方法判断给定键是否在集合中存在：
    $collection14 = collect(['account_id' => 1, 'product' => 'Desk']);
    //return $collection14->has('email') == true ? 'yes key' : 'no key';

//    implode 方法连接集合中的数据项。其参数取决于集合中数据项的类型。
//如果集合包含数组或对象，应该传递你想要连接的属性键，以及你想要放在值之间的 “粘
//合”字符串：
    $collection14 = collect([
        ['account_id' => 1, 'product' => 'Desk'],
        ['account_id' => 2, 'product' => 'Chair'],
    ]);
//    dd($collection14->implode('product','-'));
//    echo "<br/>";

//map 方法遍历集合并传递每个值给给定回调。该回调可以修改数据项并返回，从而生成一个新的经过修改的集合：
    $collection15 = collect([1, 2, 3, 4, 5]);
    $newcollection15 = $collection15->map(function($item, $keys){
        return $item * 2;
    });
    //dd($newcollection15->all());

    //only 方法返回集合中指定键的集合项：
    $collection16 = collect(['product_id' => 1, 'name' => 'Desk', 'price' => 100, 'discount' => false]);
    $only = $collection16->only(['product_id','name']);
    //dd($only->all());

   // pluck 方法为给定键获取所有集合值：
    $collection17 = collect([
        ['product_id' => 'prod-100', 'name' => 'Desk'],
        ['product_id' => 'prod-200', 'name' => 'Chair'],
    ]);
     $pluck = $collection17->pluck('name');
    //dd($pluck->all());

    //pop 方法移除并返回集合中最后面的数据项：
    $collection18 = collect([1, 2, 3, 4, 5]);
    $pop = $collection18->pop();

    //prepend 方法添加数据项到集合开头：
    $collection18->prepend(0);

    //pull 方法通过键从集合中移除并返回数据项：
    $collection18->pull('2');
    //dd($collection18->all());
    //dd($pop);

    //push 方法附加数据项到集合结尾：
    $collection19 = collect([1, 2, 3, 4]);
    $collection19->push(10);
    //dd($collection19->all());

    // put 方法在集合中设置给定键和值：
    $collection20 = collect(['product_id' => 1, 'name' => 'Desk'],['product_id' => 2, 'name' => 'Chair']);
    $collection20->put('price', 100);
    //dd($collection20->all());
    // ['product_id' => 1, 'name' => 'Desk', 'price' => 100]

    $collection21 = collect([1, 2, 3, 4, 5]);
    $random = $collection21->random(3);
    //dd($random->all());

    //take 方法使用指定数目的数据项返回一个新的集合：
    $take = $collection21->take(3);//$collection->take(-2);
    //dd($take->all());




    //search 方法为给定值查询集合，如果找到的话返回对应的键，如果没找到，则返回  false ：
    $collection22 = collect(['product_id' => 1, 'name' => 'Desk','age'=>27]);
     //dd($collection22->search(27));






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

    //数据库中的集合(默认情况下，Eloquent 模型的集合总是返回  Collection 实例)
//    $user = new \App\User();
//    $users = $user->all();
//    dd($users);
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
Route::any('formtest',function (Illuminate\Http\Request $request){
//    return  \Illuminate\Support\Facades\Input::all();
//    return $request->all();
//    return $request->query('name');
//    dd($request->has('name'));
//    dd($request->exists('hjh'));

    //请求检索
//    dd($request->only('name','sex'));
//    dd($request->except('name','sex'));
        //dd($request->fullUrl());
//    dd($request->url());

    //请求历史
//    $request->flash();
//    $request->flashOnly('name');
//    $request->flashExcept('name');

    //文件
    //dd($request->file());
//    dd($request->file('ufile')->getSize());//对象
   //dd($request->file('ufile')->getClientOriginalName());//对象  原始名字
   dd($request->file('ufile')->getClientOriginalExtension());//对象   原始扩展名
});
Route::any('formtest2',function (Illuminate\Http\Request $request){
    //请求历史
    return $request->old();
});

//会话
Route::any('sessionset',function (){
//    $session = \Illuminate\Support\Facades\Session::all();
$session = \Illuminate\Support\Facades\Session::put('username','sunbin');

});
Route::any('sessionget',function (){
    $session = \Illuminate\Support\Facades\Session::get('username');
    dd($session);
});
Route::any('sessionhas',function (){
    $session = \Illuminate\Support\Facades\Session::has('user');
    dd($session);
});
Route::any('sessionforget',function (){
    $session = \Illuminate\Support\Facades\Session::forget('username');
});
//取一次，删掉
Route::any('sessionpull',function (){
    $session = \Illuminate\Support\Facades\Session::pull('username');//不能用
    dd($session);
});

