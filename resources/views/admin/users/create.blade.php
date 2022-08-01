@extends('layout.mater')
@section('title', 'Thêm mới người dùng')
@section('content-title', 'Thêm mới người dùng')
@section('content')
@if ($errors->any())
            <div class="alert alert-success">
                @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                @endforeach
            </div>
        @endif
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">mã tài khoản</label>
            <input type="username" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">birthday</label>
            <input type="date" class="form-control" name="birthday" id="exampleInputEmail1" aria-describedby="birthday">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="Phone">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">anh</label>
            <input type="file" class="form-control" name="avatar" id="exampleInputEmail1" aria-describedby="Phone">
        </div>

        <label for="exampleInputEmail1">Phòng ban</label>
        <select name="room_id" class="form-control">
            @foreach ($rooms as $item)
                <option value="{{ $item->id }}" class="option">{{ $item->name }}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">role</label>
            <input type="radio" name="role" value="1">GĐ
            <input type="radio" name="role" value="0">NV
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1">status</label>
            <input type="radio" name="status" value="1">Kích hoạt
            <input type="radio" name="status" value="2">K kích hoạt
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-warning">Nhập lại</button>
    </form>
    <script>
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $('.select2').select2({
            // multiple: true,
            // tags: true,

            ajax: {
                url: '{{ route('users.search') }}',
                type: 'post',
                dataType: 'json',
                data: function(params) {
                    return {
                        _token: csrf_token,
                        search: params.term
                    }
                },
                success: function(response) {
                    // $('.option').html(response),
                    // console.log(response)
                    var html = '';
                    response.forEach(element => {
                    html += '<option value="'+ element.id +'" class="option">'+ element.name +'</option>'
                   });
                   console.log(html);
                   $('.option').html(html)
                },
                cache: true,
            },
        });

    </script>
@endsection
