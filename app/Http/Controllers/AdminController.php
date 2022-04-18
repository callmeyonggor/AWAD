<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    function create(Request $req){
        return Admin::create($req->all());
    }

    function index(){
        return Admin::all();
    }

    function update(Request $req, $id){
        $data=Admin::find($id);
        $data->update($req->all());
        return $data;
    }

    function delete($id){
        $data=Admin::find($id);
        $data->delete();
        return $data;
    }
}