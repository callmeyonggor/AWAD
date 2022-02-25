<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Invoice_id</th>
                    <th scope="col">Invoice_number</th>
                    <th scope="col">Item</th>
                    <th scope="col">Invoice_total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            @foreach ($record as $value)
            <tbody>
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->invoice_number}}</td>
                    <td>{{$value->item}}</td>
                    <td>{{$value->invoice_total}}</td>
                    <td>{{$value->status}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td><a href="delete/{{$value->id}}">Delete</a></td>
                    <td><a href="edit/{{$value->id}}">Edit</a></td>
                </tr>
            </tbody>
            @endforeach
            <div><a style="position:absolute;bottom:5px;right:5px;margin:0;padding:5px 3px;" href="create">Add</a></div>
        </table>
    </div>
</body>

</html>