<h1>Update Item</h1>
<form action="edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <input type="text" name="name" value="{{$data['name']}}"> <br> <br>
    <input type="text" name="remaining_quantity" value="{{$data['remaining_quantity']}}"> <br> <br>
    <input type="text" name="size" value="{{$data['size']}}"> <br> <br>
    <input type="text" name="unit_price" value="{{$data['unit_price']}}"> <br> <br>
    <input type="text" name="category" value="{{$data['category']}}"> <br> <br>
    <input type="text" name="status" value="{{$data['status']}}"> <br> <br>
    <input type="text" name="description" value="{{$data['description']}}"> <br> <br>
    <button type="submit">Update</button>
</form>