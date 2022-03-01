<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;


class ProductController extends Controller
{
    public function listing(Request $request)
    {
        $search = ['product_order_by' => 1];
        if ($request->isMethod('post')) { // filter function
            $submit_type = $request->input('submit');

            switch ($submit_type) {
                case 'search':
                    session(['product_search' => [
                        'freetext' => $request->input('freetext'),
                        'size' => $request->input('size'),
                        'product_order_by' => $request->input('product_order_by'),
                    ]]);

                    break;
                case 'reset':
                    session()->forget('product_search');
                    break;
            }
        }
        $search = session('product_search') ? session('product_search') : $search;
        $record = ProductDetail::get_record($search);
        return view('product/listing', [
            'product_order_by_sel' => ['1' => 'Low to high', '2' => 'High to Low'],
            'size_sel' => [
                ' ' => 'Please Select Size',
                'XXXS' => 'XXXS',
                'XXS' => 'XXS',
                'XS' => 'XS',
                'S' => 'S',
                'M' => 'M',
                'L' => 'L',
                'XL' => 'XL',
                'XXL' => 'XXL',
                'XXXL' => 'XXXL'
            ],
            'record' => $record,
        ]);
    } //
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
        $data = ProductDetail::find($id);
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
            return redirect('list');
        }

        return view('product/edit', [
            'submit' => route('product_edit', $id),
            'data' => $data,
        ]);
    }

    function addItem(Request $req)
    {
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
}
