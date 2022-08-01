@extends('layout.mater')
@section('title', 'edit người dùng')
@section('content-title', 'edit người dùng')
@section('content')
    <form action="{{ route('users.update', $fisrt_user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $fisrt_user->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ $fisrt_user->email }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{ $fisrt_user->password }}">
            {{-- <input type="password" class="form-control" name="password" id=""> --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">mã tài khoản</label>
            <input type="username" class="form-control" name="username" value="{{ $fisrt_user->username }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">birthday</label>
            <input type="date" class="form-control" name="birthday" value="{{ $fisrt_user->birthday }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone" value="{{ $fisrt_user->phone }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">anh</label>
            <input type="hidden" class="form-control avatar" name="avatar" value="{{ $fisrt_user->avatar }}">
            <img src="{{ asset($fisrt_user->avatar) }}" alt="" width="100px"></td>
            <input type="file" class="form-control" name="avatar_moi" id="">
        </div>
        <label for="exampleInputEmail1">Phòng ban</label>
        <select name="room_id" class="form-control select2">
            @foreach ($rooms as $item)
                <option value="{{ $item->id }}" {{ $fisrt_user->room_id == $item->id ? 'selected' : '' }} class="option">
                    {{ $item->name }}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">chức vụ</label>
            <input type="radio" name="role" value="1" {{ $fisrt_user->role == '1' ? 'checked' : '' }}>GĐ
            <input type="radio" name="role" value="0" {{ $fisrt_user->role == '0' ? 'checked' : '' }}>NV
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1">trạng thái</label>
            <input type="radio" name="status" value="1" {{ $fisrt_user->status == '1' ? 'checked' : '' }}>kích
            hoạt
            <input type="radio" name="status" value="2" {{ $fisrt_user->status == '2' ? 'checked' : '' }}>k kích
            hoạt
        </div>
        <button type="submit" class="btn btn-primary submit">Submit</button>
        <button type="reset" class="btn btn-warning">Nhập lại</button>
    </form>
    <script>
        $('.submit').click(function() {
            var anh = '';
            console.log(anh);
            $.post('{{ route('users.store') }}', {
                anh: anh
            }, function(ketqua) {
                console.log(ketqua);
            })
        })
    </script>
@endsection
