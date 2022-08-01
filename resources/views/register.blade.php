{{-- kiểm tra đang dùng layout nào --}}
@extends('layout.mater')
{{-- nơi thay đổi hiển thị --}}
@section('titel','đăng ký thông tin') 
@section('content')
<div class="container">
    <form action="{{route('a')}}" method="POST" class="form">
        @csrf
        {{-- <input type="hidden" name="__token" id=""> --}}
        <label for="">name</label>
        <input type="text" name="name" id="" class="form-control">
        <label for="">email</label>
        <input type="email" name="email" id="" class="form-control">
        <label for="">pass</label>
        <input type="passwork" name="passwork" id="" class="form-control">
        <button class="btn btn-primary" type="submit">register</button>
    </form>
</div>
@endsection
