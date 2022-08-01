<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<div class="container">
    <table class="table table-hover">
        <thead>
            <th>name</th>
            <th>email</th>
            <th>passwork</th>
            <th colspan="2">thao tác</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$list_name}}</td>
                <td>{{$list_email}}</td>
                <td>{{$list_passwork}}</td>
            </tr>
        </tbody>
    </table>
</div>
