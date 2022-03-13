<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    function listOrder() {
        $data = Order::all();
        return View('layouts/orderlist', ['data' => $data]);
    }

    function listOrderToID($InvoiceID) {
        $data = Order::where('InvoiceID', '=', $InvoiceID) -> get();
        return view('layouts/orderlistwithid', ['data' => $data]);
    }

    function addOrder(Request $req) {
        $order = new Order;
        $order -> InvoiceID = $req -> InvoiceID;
        $order -> ItemID = $req -> ItemID;
        $order -> Qty = $req -> Qty;
        $order -> save();
        return redirect('addorder');

    }

    function deleteOrder($id) {
        $deleteorder = Order::find($id);
        $deleteorder -> delete();
        return redirect('order');
    }

    function updateOrderPage($id) {
        $oldorder = Order::find($id);
        return view('layouts/updatepage', ['oldorder' => $oldorder]);
    }

    function modifyOrder(Request $req) {
        $neworder = Order::find($req -> id);
        $neworder -> InvoiceID = $req -> InvoiceID;
        $neworder -> ItemID = $req -> ItemID;
        $neworder -> Qty = $req -> Qty;
        $neworder -> save();
        return redirect('order');
    }
}