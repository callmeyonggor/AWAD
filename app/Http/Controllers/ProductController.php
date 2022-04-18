<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\InventoryDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\Order;


class ProductController extends Controller
{
    public function filter(Request $request)
    {
        $search = ['product_order_by' => 1];
        if ($request->ajax()) { // filter function
            session(['product_search' => [
                'category' => $request->input('category'),
                'product_order_by' => $request->input('order_by'),
            ]]);
        }
        $search = session('product_search') ? session('product_search') : $search;
        $record = InventoryDetail::get_record($search);
        return view('contents/product/filter', [
            'product_order_by_sel' => ['1' => 'Low to high', '2' => 'High to Low'],
            'category_sel' => [
                ' ' => 'Please Select Category',
                'Graphic T-Shirts' => 'Graphic T-Shirts',
                'Long Sleeve Shirts' => 'Long Sleeve Shirts',
                'Polos' => 'Polos',
            ],
            'search' => $search,
            'record' => $record,
        ]);
    } //

    public function detail($id, Request $request)
    {
        $record = InventoryDetail::find($request->input('id'));
        if (!$record) {
            $records = InventoryDetail::find($id);
            if (!$records) {
                Session::flash('fail_msg', 'Invalid Record, please try again later.');
                return redirect()->route('product_filter');
            }
        }
        return view('contents/product/detail', [
            'record' => $record ?? $records,
            'size' => [
                '' => 'Please select size',
                'S' => 'S',
                'M' => 'M',
                'L' => 'L',
            ],
        ]);
    }

    public function order(Request $request)
    {
        $validator = null;
        if ($request->isMethod('post')) {
            $submit_type = $request->input('submit');
            switch ($submit_type) {
                case 'add':
                    $data = InventoryDetail::find($request->input('id'));
                    $post = (object) $request->all();
                    $validator = Validator::make($request->all(), [
                        'size' => "required",
                        'quantity' => 'required|gt:0',
                    ])->setAttributeNames([
                        'size' => 'Size',
                        'quantity' => 'Quantity',
                    ]);
                    if (!$validator->fails()) {
                        $cart = session()->get('cart');
                        if (!$cart) {
                            $cart = [
                                $data->id . $request->input('size') => [
                                    "id" => $data->id,
                                    "name" => $data->name,
                                    "quantity" => $request->input('quantity'),
                                    "size" => $request->input('size'),
                                    "unit_price" => $data->unit_price
                                ]
                            ];
                            session()->put('cart', $cart);
                            Session::flash('success_msg', 'Product added to cart');
                            return view('contents/product/order');
                        }
                        // if cart not empty then check if this product exist
                        if (isset($cart[$data->id . $request->input('size')]) && $cart[$data->id . $request->input('size')]['size'] == $request->input('size')) {
                            $cart[$data->id . $request->input('size')]['quantity'] = $cart[$data->id . $request->input('size')]['quantity'] + $request->input('quantity');
                            session()->put('cart', $cart);
                            Session::flash('success_msg', 'Product added to cart');
                            return view('contents/product/order');
                        }
                        $cart[$data->id . $request->input('size')] = [
                            "id" => $data->id,
                            "name" => $data->name,
                            "quantity" => $request->input('quantity'),
                            "size" => $request->input('size'),
                            "unit_price" => $data->unit_price
                        ];
                        session()->put('cart', $cart);
                        Session::flash('success_msg', 'Product added to cart');
                        return view('contents/product/order');
                    }
                    return view("contents/product/detail", [
                        'id' => $request->input('id'),
                        'post' => $post,
                        'record' => $data,
                        'size' => [
                            '' => 'Please select size',
                            'S' => 'S',
                            'M' => 'M',
                            'L' => 'L',
                        ],
                    ])->withErrors($validator);
                    break;
                case 'cancel':
                    return redirect(route('product_filter'));
                    break;
            }
        }
        return view('contents/product/order');
    }

    public function delete_order(Request $request)
    {
        $cart = session()->get('cart');
        if (isset($cart[$request->input('data')])) {
            unset($cart[$request->input('data')]);
            session()->put('cart', $cart);
        }
        Session::flash('success_msg', 'Product deleted');
        return view('contents/product/order');
    }

    public function submit_order(Request $request)
    {
        if ($request->isMethod('post')) {
            $submit_type = $request->input('submit');
            switch ($submit_type) {
                case 'add':
                    return redirect(route('product_filter'));
                case 'clear':
                    Session::forget('cart');
                    Session::flash('success_msg', 'Product order cleared');
                    return redirect(route('product_order'));
                    break;
                case 'company':
                    return view('contents/product/company', [
                        'id' => $request->input('id'),
                        'quantity' => $request->input('quantity'),
                        'size' => $request->input('size'),
                        'unit_price' => $request->input('unit_price'),
                        'subtotal' => $request->input('subtotal'),
                        'total' => $request->input('total')
                    ]);
                    break;
                case 'submit':
                    $post = (object) $request->all();
                    $validator = Validator::make($request->all(), [
                        'company' => "required",
                        'address' => 'required',
                        'phone' => 'required|numeric|regex:/(01)[0-9]{9}/',
                    ])->setAttributeNames([
                        'company' => 'Company',
                        'address' => 'Address',
                        'phone' => 'Phone',
                    ]);
                    if (!$validator->fails()) {
                        Invoice::create([
                            'invoice_total' => $request->input('total'),
                            'name' => Auth::user()->name,
                            'company_name' => $request->input('company'),
                            'address' => $request->input('address'),
                            'phone' => $request->input('phone'),
                            'user_id' => Auth::user()->id,
                        ]);

                        $invoice = DB::table('invoices')->latest()->first();
                        foreach ($request->input('id') as $key => $value) {
                            Order::create([
                                'InvoiceID' => $invoice->id,
                                'ItemID' => $value,
                                'Size' => $request->input('size')[$key],
                                'Qty' => $request->input('quantity')[$key],
                            ]);
                        }
                        Session::forget('cart');
                        Session::flash('success_msg', 'Order Placed');
                        return view('contents/product/order');
                    }
                    return view('contents/product/company', [
                        'post' => $post,
                        'id' => $request->input('id'),
                        'quantity' => $request->input('quantity'),
                        'size' => $request->input('size'),
                        'unit_price' => $request->input('unit_price'),
                        'subtotal' => $request->input('subtotal'),
                        'total' => $request->input('total')
                    ])->withErrors($validator);
                    break;
            }
        }
    }
}
