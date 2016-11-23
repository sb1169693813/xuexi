<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    //可填充
    protected $fillable = ['user_name','age'];
    //查
    public function userRead()
    {
         return  $this->all();
    }

//    改
    public function userUpdate(){
       $users = $this->where('user_id','<',2);
        $users->update(['user_name'=>'dabai','age'=>25]);
//        $users->save();
    }
    
    //删
    public function userDelete()
    {
        $user = $this->find(5);
        $user->delete();
    }
}
