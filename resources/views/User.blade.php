<!-- CSS only -->
@extends('layout.mater')
@section('content')
@section('titel','User')
<div class="container">
    <table class="table table-hover">
        <thead>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Địa chỉ</th>
            <th colspan="2">thao tác</th>
        </thead>
        <tbody>
            @foreach ($list_user as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['age'] }}</td>
                    <td>{{ $user['address'] }}</td>
                    <td><button class="btn btn-primary">{{$user['status'] ? 'kich hoat': 'khong kich hoat'}}</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
