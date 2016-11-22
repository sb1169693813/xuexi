<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyWelcomeController extends Controller
{
    public function index(){
        $data = [
            'name'=>'sunbin',
            'age'=>25,
        ];
      return view('mywelcome',$data);
        //return view('mywelcome')->with(['name'=>$data['name'],'age'=>$data['age']]);
   }
}
