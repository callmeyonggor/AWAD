<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    function create(Request $req){
        return Employee::create($req->all());
    }

    function index(){
        return Employee::all();
    }

    function update(Request $req, $id){
        $data=Employee::find($id);
        $data->update($req->all());
        return $data;
    }

    function delete($id){
        $data=Employee::find($id);
        $data->delete();
        return $data;
    }
}