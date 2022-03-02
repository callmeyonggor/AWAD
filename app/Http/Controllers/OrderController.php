<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    function listOrder() {
        $data = Order::all();
        return view('orderlist');
    }
}