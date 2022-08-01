@extends('layout.mater')
@section('title', 'quan ly nguoi dung')
@section('content-title', 'quan ly nguoi dung')

@section('content')

<div class="container">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">name</label>
        <input type="text" name="name" id="" class="form-control">
        <label for="">giá tiền</label>
        <input type="number" name="price" id="" class="form-control">
        <label for="">ảnh</label>
        <input type="file" name="thumbnail_url" id="" class="form-control">
        <label for="">trạng thái</label>
        <select name="status" id="" class="form-control">
            <option value="0">kích hoạt</option>
            <option value="1">k kích hoạt</option>
        </select>
        <button class="btn btn-primary">add</button>
    </form>
</div>
@endsection