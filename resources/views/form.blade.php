<form action="{{url('formtest')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div>
        <lable>姓名：</lable>
        <input type="text" name="name">
    </div>
    <div>
        <lable>年龄：</lable>
        <input type="text" name="age">
    </div>
    <div>
        <input type="submit" value="提交">
    </div>
    <div>
        文件:
        <input type="file" name="ufile">
    </div>
</form>