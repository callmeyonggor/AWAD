<h1>Orders</h1>
<br>
<table border=1>
    <tr>
        <th>id</th>
        <th>Invoice ID</th>
        <th>Item ID</th>
        <th>Quantity</th>
        <th>Creation date</th>
        <th>Last modified</th>
        <th>Delete</th>
        <th>Modify</th>
    </tr>
    @foreach($data as $order)
    <tr>
        <td>{{$order -> id}}</td>
        <td>{{$order -> InvoiceID}}</td>
        <td>{{$order -> ItemID}}</td>
        <td>{{$order -> Qty}}</td>
        <td>{{$order -> created_at}}</td>
        <td>{{$order -> updated_at}}</td>
        <td><a href={{"delete/".$order -> id}}>Delete</a></td>
        <td><a href={{"update/".$order -> id}}>Modify</a></td>
    </tr>
    @endforeach

</table>