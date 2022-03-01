<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;


class ProductController extends Controller
{
    //
    function list()
    {
        $data=ProductDetail::all();
        return view('product/list', ['product'=>$data]);
    }

    function delete($id)
    {
        $data=ProductDetail::find($id);
        $data->delete();
        return redirect('product/list');
    }

    function edit($id)
    {
        $data=ProductDetail::find($id);
        return view('product/edit',['data'=>$data]);
    }

    function update(Request $req)
    {
        dd($req);
        $data=ProductDetail::find($req->id);
        $data->name=$req->name;
        $data->remaining_quantity=$req->remaining_quantity;
        $data->size=$req->size;
        $data->unit_price=$req->unit_price;
        $data->category=$req->category;
        $data->status=$req->status;
        $data->description=$req->description;
        $data->save();
        return redirect('product/list');
    }

    function addItem(Request $req)
    {   
        $data = new ProductDetail;
        $data->name=$req->name;
        $data->remaining_quantity=$req->remaining_quantity;
        $data->size=$req->size;
        $data->unit_price=$req->unit_price;
        $data->category=$req->category;
        $data->status=$req->status;
        $data->description=$req->description;
        $data->save();
        return redirect('product/add');
    }
}
