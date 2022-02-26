<h1>Items List</h1>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Item Name</td>
        <td>Quatity</td>
        <td>Size</td>
        <td>Unit Price</td>
        <td>Operation</td>
        <td>Operation 2</td>
    </tr>
@foreach ($item_details as $data)
    <tr>
        <td>{{$data['id']}}</td>
        <td>{{$data['item_name']}}</td>
        <td>{{$data['item_quantity']}}</td>
        <td>{{$data['item_size']}}</td>
        <td>{{$data['item_unit_price']}}</td>
        <td><a href={{"delete/".$data['id']}} >Delete</a></td>
        <td><a href={{"edit/".$data['id']}} >Edit</a></td>
    </tr>
@endforeach
</table>
<a href="/add">Add items</a>