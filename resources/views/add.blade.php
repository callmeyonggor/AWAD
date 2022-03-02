<h1>Add Item</h1>
<form action="add" method="POST">
    @csrf
    <input type="text" name="item_name" placeholder="Enter Item Name"> <br> <br>
    <input type="text" name="item_quantity" placeholder="Enter Item Quantity"> <br> <br>
    <input type="text" name="item_size" placeholder="Enter Item Size"> <br> <br>
    <input type="text" name="item_unit_price" placeholder="Enter Item Price"> <br> <br>
    <button type="submit">Add Item</button>
</form>
<a href="/list">Show all items</a>