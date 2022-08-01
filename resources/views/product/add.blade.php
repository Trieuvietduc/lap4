@extends('layout.mater')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titel','add')</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Họ và Tên</label>
        <input type="text" name="" id="" class="form-control">
        <label for="">email</label>
        <input type="text" name="" id="" class="form-control">
        <label for="">mật khẩu</label>
        <input type="text" name="" id="" class="form-control">
        <label for="">Avatar</label>
        <input type="file" name="" id="" class="form-control">
        <button class="btn btn-primary">add</button>
    </form>
</body>
</html>
@endsection