<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemDetail;

class ItemDetailsController extends Controller
{
    //
    function list()
    {
        $data=ItemDetail::all();
        return view('list', ['item_details'=>$data]);
    }

    function delete($id)
    {
        $data=ItemDetail::find($id);
        $data->delete();
        return redirect('list');
    }

    function edit($id)
    {
        $data=ItemDetail::find($id);
        return view('edit',['data'=>$data]);
    }

    function update(Request $req)
    {
        $data=ItemDetail::find($req->id);
        $data->item_name=$req->item_name;
        $data->item_quantity=$req->item_quantity;
        $data->item_size=$req->item_size;
        $data->item_unit_price=$req->item_unit_price;
        $data->save();
        return redirect('list');
    }

    function addItem(Request $req)
    {   
        $data = new ItemDetail;
        $data->item_name=$req->item_name;
        $data->item_quantity=$req->item_quantity;
        $data->item_size=$req->item_size;
        $data->item_unit_price=$req->item_unit_price;
        $data->save();
        return redirect('add');
    }
}
