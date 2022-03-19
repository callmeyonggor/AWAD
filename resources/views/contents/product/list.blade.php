<h1>Inventory</h1>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Item Name</td>
        <td>Quatity</td>
        <td>Size</td>
        <td>Unit Price</td>
        <td>Description</td>
        <td>Category</td>
        <td>Status</td>
        <td>Operation</td>
        <td>Operation 2</td>
    </tr>
@foreach ($product as $data)
    <tr>
        <td>{{$data['id']}}</td>
        <td>{{$data['name']}}</td>
        <td>{{$data['remaining_quantity']}}</td>
        <td>{{$data['size']}}</td>
        <td>{{$data['unit_price']}}</td>
        <td>{{$data['description']}}</td>
        <td>{{$data['category']}}</td>
        <td>{{$data['status']}}</td>
        <td><a href={{"delete/".$data['id']}} >Delete</a></td>
        <td><a href={{"edit/".$data['id']}} >Edit</a></td>
    </tr>
@endforeach
</table>
<a href="add">Add items</a>
