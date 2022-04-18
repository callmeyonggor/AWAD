<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\InventoryDetail;

class OrderController extends Controller
{
    

    function listOrder() {
        $data = Order::all();
        return View('order/orderlist', ['data' => $data]);
    }

    function view($InvoiceID) {
        $data = Order::where('InvoiceID', '=', $InvoiceID) -> get();
        $invoice = Invoice::find($InvoiceID);
        return view('order/orderlistwithid', ['data' => $data, 'invoice' => $invoice,]);
    }

    function getProductName($id) {
        $data = InventoryDetail::find($id);
        $name = $data->name;
        return $name;
    }

    function getProductPrice($id) {
        $data = InventoryDetail::find($id);
        $unit_price = $data->unit_price;
        return $unit_price;
    }

    function getProductOrderPrice($itemid, $orderid) {
        $item = InventoryDetail::find($itemid);
        $order = Order::find($orderid);
        $unit_price = $item->unit_price;
        $qty = $order->Qty;
        $order_price = $qty * $unit_price;
        return $order_price;
    }
}