<h1>Update User</h1>
<br>
<form action="" method="POST">
    @csrf
    <input type="hidden" value={{$oldorder -> id}}>
    <label for="InvoiceID">Invoice ID</label>
    <br>
    <input type="text" id="InvoiceID" name="InvoiceID" placeholder={{$oldorder -> InvoiceID}}>
    <br>
    <br>
    <label for="ItemID">Item ID</label>
    <br>
    <input type="text" id="ItemID" name="ItemID" placeholder={{$oldorder -> ItemID}}>
    <br>
    <br>
    <label for="Qty">Quantity</label>
    <br>
    <input type="number" id="Qty" name="Qty" placeholder={{$oldorder -> Qty}}>
    <br>
    <br>
    <input type="submit" value="Update User">
</form>