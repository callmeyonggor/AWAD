<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\DB;
use App\Models\User;
use App\Models\Employee;

class UserController extends Controller
{
    function addUser(Request $req){
        //if its an Employee Account
        //it is creating one row in User and Employee
        //and has 1:1 relationship between User(id_PK):Employee(user_id_FK)
        //else its an Customer Account
        //it is creating one row in User
        if ($req->is_emply == 1){ 
            User::create ($req -> except(['department', 'permission']))
            -> employee() -> create($req -> only(['department', 'permission']));
        } else {
            User::create($req -> all());
        }
        return redirect('/user');
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
