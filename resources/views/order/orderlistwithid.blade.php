@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <div style="background-color: lightgrey;">
                        <div>
                            Invoice {{$invoice['id']}}
                        </div>
                        <div>{{$invoice['created_at']}}</div>
                    </div>
                    <Table class="table" "border=1 style=" width: 100%;">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Order Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{App\Http\Controllers\OrderController::getProductName($item['ItemID']);}}</td>
                                <td>{{$item['Size']}}</td>
                                <td>{{$item['Qty']}}</td>
                                <td>{{App\Http\Controllers\OrderController::getProductPrice($item['ItemID']);}}</td>
                                <td>{{App\Http\Controllers\OrderController::getProductOrderPrice($item['ItemID'], $item['id']);}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </Table>
                    <div style="text-align: right; padding-right: 50px">
                        <p>Total Price: {{$invoice["invoice_total"]}}</p>
                    </div>
                    <Button><a href="http://localhost:8000/invoicelist">Return to invoice list</a></Button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection