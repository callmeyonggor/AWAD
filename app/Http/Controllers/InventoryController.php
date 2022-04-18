<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryDetail;

class InventoryController extends Controller
{
    function index(){
        return InventoryDetail::all();
    }

    function create(Request $req){
        return InventoryDetail::create($req->all());
    }

    function update(Request $req, $id){
        $data=InventoryDetail::find($id);
        $data->update($req->all());
        return $data;
    }

    function delete($id){
        $data=InventoryDetail::find($id);
        $data->delete();
        return $data;
    }
}
