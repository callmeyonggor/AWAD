<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function create(Request $req){
        return User::create($req->all());
    }

    function index(){
        return User::all();
    }

    function update(Request $req, $id){
        $data=User::find($id);
        $data->update($req->all());
        return $data;
    }

    function delete($id){
        $data=User::find($id);
        $data->delete();
        return $data;
    }
}