<!-- CSS only -->
@extends('auth.auth')
@section('main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<div class="container">
    <div>
        <ul>
            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            @endif
        </ul>
    </div>
    @if (Session::has('thongbao'))
        <div class="alert alert-success">
            {{ Session::get('thongbao') }}
        </div>
    @endif
    <form action="{{ route('auth.postlogin') }}" method="post">
        @csrf
        <div>
            <label for="">email</label>
            <input type="text" name="email" id="" class="form-control">
        </div>
        <div>
            <label for="">password</label>
            <input type="text" name="password" id="" class="form-control">
        </div>
        <div>
            <button class="btn btn-primary">login</button>
        </div>
    </form>
</div>
@endsection