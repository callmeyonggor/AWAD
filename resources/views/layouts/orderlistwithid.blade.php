<h1>Orders</h1>
<br>
<table border=1>
    <tr>
        <th>id</th>
        <th>Invoice ID</th>
        <th>User</th>
        <th>Recipient</th>
        <th>Phone</th>
        <th>Payment Method</th>
        <th>Item ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
        <th>Creation date</th>
        <!-- <th>Last modified</th> -->
    </tr>
    @foreach($data as $order)
    <tr>
        <td>{{$order -> id}}</td>
        <td>{{$order -> InvoiceID}}</td>
        <td>User</td>
        <td>Recipient</td>
        <td>Phone</td>
        <td>Payment Method</td>
        <td>{{$order -> ItemID}}</td>
        <td><a href="http://localhost:8000/test">Product Name</a></td>
        <td>{{$order -> Qty}}</td>
        <td>Unit Price</td>
        <td>Total Price</td>
        <td>{{$order -> created_at}}</td>
        <!-- <td>{{$order -> updated_at}}</td> -->
        <!-- <td><a href={{"deleteorder/".$order -> id}}>Delete</a></td>
        <td><a href={{"updateorder/".$order -> id}}>Modify</a></td> -->
    </tr>
    @endforeach

</table>