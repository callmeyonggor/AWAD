<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\ProductDetail;


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

            // switch ($submit_type) {
            //     case 'reset':
            //         session()->forget('product_search');
            //         break;
            // }
        }
        $search = session('product_search') ? session('product_search') : $search;
        $record = ProductDetail::get_record($search);
        return view('contents/product/filter', [
            'product_order_by_sel' => ['1' => 'Low to high', '2' => 'High to Low'],
            'category_sel' => [
                ' ' => 'Please Select Category',
                'Half Sleeve T' => 'Half Sleeve T',
                'V-neck T' => 'V-neck T',
                'Ringer T' => 'Ringer T',
                'Cap-sleeve T' => 'Cap-sleeve T',
                'Pocket T' => 'Pocket T',
                'Turtle-neck T' => 'Turtle-neck T',
                'Singlet T' => 'Singlet T',
                'Muscle T' => 'Muscle T',
                'Polo-collar T' => 'Polo-collar T'
            ],
            'search' => $search,
            'record' => $record,
        ]);
    } //

    public function detail($id)
    {
        $record = ProductDetail::find($id);
        if (!$record) {
            Session::flash('fail_msg', 'Invalid Record, please try again later.');
            return redirect()->route('product_filter');
        }
        return view('contents/product/detail', [
            'record' => $record,
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
        $data = null;
        if ($request->isMethod('post')) {
            $submit_type = $request->input('submit');
            switch ($submit_type) {
                case 'add':
                    $data = ProductDetail::find($request->input('id'));
                    $cart = session()->get('cart');
                    if (!$cart) {
                        $cart = [
                            $data->id.$request->input('size') => [
                                "id" => $data->id,
                                "quantity" => $request->input('quantity'),
                                "size" => $request->input('size'),
                                "remaining_quantity" => $data->remaining_quantity,
                                "unit_price" => $data->unit_price
                            ]
                        ];
                        session()->put('cart', $cart);
                        Session::flash('success_msg', 'Product added to cart');
                        return view('contents/product/order');
                    }
                    // if cart not empty then check if this product exist
                    if (isset($cart[$data->id.$request->input('size')]) && $cart[$data->id.$request->input('size')]['size'] == $request->input('size')) {
                        $cart[$data->id.$request->input('size')]['quantity'] = $cart[$data->id.$request->input('size')]['quantity'] + $request->input('quantity');
                        session()->put('cart', $cart);
                        Session::flash('success_msg', 'Product added to cart');
                        return view('contents/product/order');
                    }
                    $cart[$data->id.$request->input('size')] = [
                        "id" => $data->id,
                        "quantity" => $request->input('quantity'),
                        "size" => $request->input('size'),
                        "remaining_quantity" => $data->remaining_quantity,
                        "unit_price" => $data->unit_price
                    ];
                    session()->put('cart', $cart);
                    Session::flash('success_msg', 'Product added to cart');
                    return view('contents/product/order');
                    break;
                case 'cancel':
                    return redirect(route('product_filter'));
                    break;
            }
        }


        return view('contents/product/order');
    }

    public function submit_order(Request $request){
        if ($request->isMethod('post')) {
            $submit_type = $request->input('submit');
            switch ($submit_type) {
                case 'add':
                    return redirect(route('product_filter'));
                case 'clear':
                    $request->session()->forget('cart');
                    return redirect(route('product_order'));
                    break;
                case 'submit':
                    dd($request);
                    break;
            }
        }
    }
    //
    function list()
    {
        $data = ProductDetail::all();
        return view('product/list', ['product' => $data]);
    }

    function delete($id)
    {
        $data = ProductDetail::find($id);
        $data->delete();
        return redirect('product/list');
    }

    public static function edit(Request $req, $id)
    {
        $data = ProductDetail::query()->where('id', $id)->first();
        if ($req->isMethod('post')) {
            $data->update([
                'name' => $req->name,
                'remaining_quantity' => $req->remaining_quantity,
                'size' => $req->size,
                'unit_price' => $req->unit_price,
                'category' => $req->category,
                'status' => $req->status,
                'description' => $req->description,
            ]);
            return redirect('product/list');
        }

        return view('product/edit', [
            'submit' => route('product_edit', $id),
            'data' => $data,
        ]);
    }

    public function add(Request $req)
    {
        if ($req->isMethod('post')) {
            $data = new ProductDetail;
            $data->name = $req->name;
            $data->remaining_quantity = $req->remaining_quantity;
            $data->size = $req->size;
            $data->unit_price = $req->unit_price;
            $data->category = $req->category;
            $data->status = $req->status;
            $data->description = $req->description;
            $data->save();
            return redirect('product/add');
        }
        return view('product/add');
    }
}
