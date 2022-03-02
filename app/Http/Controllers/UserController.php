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
            return view('/user/adduser', ['type' => $type]);
        }
    }

    function getUsers(){
        $customers = User::where('is_emply', 0) -> get();
        $employees = User::where('is_emply', 1) -> with('employee') -> get(); 
        return view(
            'company/admin', 
            [
                'customer' => $customers,
                'employees' => $employees
            ]);
    }
    
    function deleteUser($id){
        User::find($id) -> delete();
        return redirect('/company/admin');
    }

    function editUser(Request $req, $type, $id){
        $user = User::find($id);
        if ($req -> isMethod('post')){
            if ($type == "employee"){
                $req['is_emply'] = 1;
                $user -> update ($req ->all());
                $user -> employee -> update([
                    'department' => $req -> department,
                    'permission' => $req -> permission
                ]);                 
            } else {
                $req['is_emply'] = 0;
                $user -> update($req-> all());
            }
            return redirect('/company/admin');
        } else {
            return view('/user/edituser', ['type' => $type, 'user' => $user]);
        }
    }

    function getUser(Request $req){
        $user = User::find($req->id);
        $employee = User::find($req->id) -> employee;
        return [$user, $employee];
    }
}
