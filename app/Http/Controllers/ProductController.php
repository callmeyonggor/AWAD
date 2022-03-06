<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Session;


class ProductController extends Controller
{
    public function filter(Request $request)
    {
        $search = 0;
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
        return view('product/filter', [
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

    public function detail($id){
        $record = ProductDetail::find($id);
        if(!$record){
            Session::flash('fail_msg', 'Invalid Record, please try again later.');
            return redirect()->route('product_filter');
        }
        return view('product/detail',['record' => $record]);
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
        $data = ProductDetail::query()->where('id' , $id)->first();
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
