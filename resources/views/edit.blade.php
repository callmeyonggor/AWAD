<h1>Update Item</h1>
<form action="/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <input type="text" name="item_name" value="{{$data['item_name']}}"> <br> <br>
    <input type="text" name="item_quantity" value="{{$data['item_quantity']}}"> <br> <br>
    <input type="text" name="item_size" value="{{$data['item_size']}}"> <br> <br>
    <input type="text" name="item_unit_price" value="{{$data['item_unit_price']}}"> <br> <br>
    <button type="submit">Update</button>
</form>