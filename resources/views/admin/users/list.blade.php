@extends('layout.mater')
@section('title', 'quan ly nguoi dung')
@section('content-title', 'quan ly nguoi dung')

@section('content')

    <div class="container">
        <div class="my-3">
           <a href="{{route('users.create')}}"><button class="btn btn-primary">add</button></a>
        </div>
        @if (Session::has('thongbao'))
            <div class="alert alert-success">
                {{ Session::get('thongbao') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
                <th>stt</th>
                <th>Tên</th>
                <th>ngay sing</th>
                <th>ma nhan vien</th>
                <th>email</th>
                <th>phòng ban</th>
                <th>avatar</th>
                <th colspan="2">thao tác</th>
            </thead>
            <tbody>
                @foreach ($list_user as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{isset($user->room) ? $user->room->name : "" }}</td>
                        <td><img src="{{ asset($user->avatar) }}" alt="" width="100px"></td>
                        <td>
                            <form action="{{ route('users.delete', $user->id) }}" method="post">
                                <button class="btn btn-danger">xoa</button>
                                @csrf
                                @method('DELETE')
                            </form>

                           <a href="{{route('users.edit', $user->id)}}"><button class="btn btn-warning" >edit</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $list_user->links() }}
        </div>
    </div>
@endsection
