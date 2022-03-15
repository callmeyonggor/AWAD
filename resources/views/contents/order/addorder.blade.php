<h1>Add Oder</h1>
<br>
<form action="" method="POST">
    @csrf
    <label for="InvoiceID">Invoice ID</label>
    <br>
    <input type="text" name="InvoiceID" id="InvoiceID">
    <br>
    <br>
    <label for="ItemId">Item ID</label>
    <br>
    <input type="text" name="ItemID" id="ItemID">
    <br>
    <br>
    <label for="Qty">Quantity</label>
    <br>
    <input type="number" step="1" min="0" name="Qty" id="Qty">
    <br>
    <br>
    <input type="submit" value="Add Order">
</form>