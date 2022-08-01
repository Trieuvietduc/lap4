@extends('layout.mater')
@section('title', 'quan ly nguoi dung')
@section('content-title', 'quan ly nguoi dung')

@section('content')

    <div class="container">
        <div class="my-3">
            <a href="{{ route('products.create') }}"><button class="btn btn-primary">add</button></a>
        </div>
        <form action="{{ route('products.search') }}" method="get">
            <input type="text" name="search" class="form-control">
            <button class="btn btn-primary">tìm kiếm</button>
        </form>

        @if (Session::has('thongbao'))
            <div class="alert alert-success">
                {{ Session::get('thongbao') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
                <th>stt</th>
                <th>Tên</th>
                <th>giá tiền</th>
                <th>ảnh</th>
                <th>trạng thái</th>
                <th colspan="2">thao tác</th>
            </thead>
            <tbody>
                @foreach ($product as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->price }}</td>
                        <td><img src="{{ $value->thumbnail_url }}" alt="" width="100px"></td>
                        <td>
                            <a href="{{ route('products.status', $value) }}">
                                <button class="btn btn-primary">{{ $value->status == 0 ? 'Còn hàng' : 'hết hàng' }}
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('products.delete', $value->id) }}" method="post">
                                <button class="btn btn-danger">xoa</button>
                                @csrf
                                @method('DELETE')
                            </form>

                            <a href=""><button class="btn btn-warning">edit</button></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div>
            @if ($x == 1)
                {{ $product->links() }}
            @endif

        </div>
    </div>
    {{-- <script>
        function status(value) {
            console.log(value);
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/products/status/' + value.id,
                data: {
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
                error : function(data){
                    console.log(data);
                }
            })
        }
    </script> --}}
@endsection
