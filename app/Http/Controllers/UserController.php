<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\DB;
use App\Models\User;
use App\Models\Employee;

class UserController extends Controller
{
    function addUser(Request $req, $type){
        if ($req -> isMethod('post')){
            if ($type == "employee"){
                $req['is_emply'] = 1;
                User::create ($req -> except(['department', 'permission']))
                -> employee() -> create($req -> only(['department', 'permission']));
            } else {
                $req['is_emply'] = 0;
                User::create($req -> all());
            }
            return redirect('/company/admin');
        } else {
            return view('/company/add'.$type);
        }
        
    }

    function getUsers(){
        $customers = User::where('is_emply', 0) -> get();
        $employees = User::where('is_emply', 1) -> with('employee') -> get();
        // dd($employees);
        return view(
            'company/admin', 
            [
                'users' => $customers,
                'employees' => $employees
            ]);
    }
    
    function deleteUser(Request $req){
        User::find($req->id) -> delete();
        return redirect('/user');
    }

    function updateUser(Request $req){
        $user = User::find($req->id);
        $user -> update($req->all());
        $user -> employee() -> update([
            'department' => $req -> department,
            'permission' => $req -> permission
        ]);
        return redirect('/user');
    }

    function getUser(Request $req){
        $user = User::find($req->id);
        $employee = User::find($req->id) -> employee;
        return [$user, $employee];
    }
}
