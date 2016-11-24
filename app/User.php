<?php

namespace App;

use App\Scopes\AgeScope;
use Illuminate\Database\Eloquent\Model;

//默认规则是模型类名的复数作为与其对应的表名，除非在模型类中明确指定了其它名称。
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
        //批量更新
//        $users = $this->where('user_id','<',3);
//        $users->update(['user_name'=>'dabai','age'=>44]);
        //基本更新
        $user = $this->find(1);
        $user->user_name = 'sun';
        $user->save();
//        $users->save();
    }
    //删
    public function userDelete()
    {
        $user = $this->find(4);
        $user->delete();
    }
    //增
    public function userAdd(){
        $data = [
            'user_name'=>'jing',
            'age'=>27
        ];
        $this->fill($data);
        $this->save();
    }

    //定义全局作用域
    //要将全局作用域分配给模型，需要重写给定模型的  boot 方法并使用  addGlobalScope 方法
    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new AgeScope());
    }

}
