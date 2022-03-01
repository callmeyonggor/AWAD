<h1>Add Item</h1>
<form action="add" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter Item Name"> <br> <br>
    <input type="text" name="remaining_quantity" placeholder="Enter Item Quantity"> <br> <br>
    <input type="text" name="size" placeholder="Enter Item Size"> <br> <br>
    <input type="text" name="unit_price" placeholder="Enter Item Price"> <br> <br>
    <input type="text" name="category" placeholder="Enter Item Category"> <br> <br>
    <input type="text" name="status" placeholder="Enter Item Price"> <br> <br>
    <input type="text" name="description" placeholder="Enter Item Description"> <br> <br>
    <button type="submit">Add Item</button>
</form>
<a href="/list">Show all items</a>