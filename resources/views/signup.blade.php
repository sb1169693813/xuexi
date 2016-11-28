<form action="signup" method="post">
    {{csrf_field()}}
    用户名:
    <input type="text" name="user_name">
    密码:
    <input type="password" name="user_password">
    <input  type="submit" value="注册">
    @if(count($errors) > 0)
        <div class="mark">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
</form>