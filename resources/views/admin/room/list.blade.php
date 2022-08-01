@extends('layout.mater')
@section('title', 'quan ly nguoi dung')
@section('content-title', 'room')

@section('content')

    <div class="container">
        <div class="my-3">
            <a href="{{ route('users.create') }}"><button class="btn btn-primary">add</button></a>
        </div>
        @if (Session::has('thongbao'))
            <div class="alert alert-success">
                {{ Session::get('thongbao') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
                <th>tên phòng ban</th>
                <th>nhân viên</th>
                <th colspan="2">thao tác</th>
            </thead>
            <tbody>
                @foreach ($room as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            <ul>
                                @foreach ($user->users as $item)
                                    <li>{{$item->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <form action="" method="post">
                                <button class="btn btn-danger">xoa</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
