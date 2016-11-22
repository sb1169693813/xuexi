<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>welcome：{{$name}},{{$name}}今年{{$age}}岁</h1>
    {{--如果你不想要数据被处理，可以使用如下语法：--}}
    {{--<p>{!! "<script>alert('111')</script>" !!}</p>--}}
    <p>{{  "<script>alert('111')</script>" }}  </p>
</body>
</html>