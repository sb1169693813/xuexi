<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
//自定义全局作用域很简单，首先定义一个实现  Illuminate\Database\Eloquent\Scope 接口
//的类，该接口要求你实现一个方法：apply。需要的话可以在  apply 方法中添加  where 条件
//到查询：
class AgeScope implements Scope{
    public function apply(Builder $builder, Model $model){
        return $builder->where('user_id', '>', 1);
    }
}