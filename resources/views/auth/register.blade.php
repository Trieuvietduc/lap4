@extends('auth.auth')
@section('main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
    span {
        color: red;
    }
</style>
<div class="container">
    <form action="{{route('auth.getregisteradd')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="name" value="{{old('name')}}">
            @if ($errors->has('name'))
                <span>{{$errors->first('name')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                aria-describedby="emailHelp" value="{{old('email')}}">
                @if ($errors->has('email'))
                <span>{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="{{old('password')}}">
            @if ($errors->has('password'))
                <span>{{$errors->first('password')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">nhập lại mật khẩu</label>
            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" value="{{old('password_confirmation')}}">
            @if ($errors->has('password_confirmation'))
                <span>{{$errors->first('password_confirmation')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">mã tài khoản</label>
            <input type="username" class="form-control" name="username" id="exampleInputEmail1"
                aria-describedby="username" value="{{old('username')}}">
                @if ($errors->has('username'))
                <span>{{$errors->first('username')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">birthday</label>
            <input type="date" class="form-control" name="birthday" id="exampleInputEmail1"
                aria-describedby="birthday" value="{{old('birthday')}}">
                @if ($errors->has('birthday'))
                <span>{{$errors->first('birthday')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="Phone" value="{{old('phone')}}">
            @if ($errors->has('phone'))
                <span>{{$errors->first('phone')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">anh</label>
            <input type="file" class="form-control" name="avatar" id="exampleInputEmail1" aria-describedby="Phone" value="{{old('avatar')}}">
            @if ($errors->has('avatar'))
                <span>{{$errors->first('avatar')}}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-warning">Nhập lại</button>
    </form>
</div>
@endsection