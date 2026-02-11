<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    //listing all users
    function list()
    {
        return User::all();
    }
    //ading new user

    //validation rules
    function addUser(Request $request)
    {
        $rules = array(
            "name" => "required|min:3|max:20",
            "email" => "required|email|unique:users,email",
        );

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return $validator->errors();
        } else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            if ($user) {
                return ["result" => "User Added"];
            } else {
                return ["result" => "Error Occured"];
            }
        }
    }
    //updating user
    function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result = $user->save();
        if ($result) {
            return ["result" => "User Updated"];
        } else {
            return ["result" => "Error Occured"];
        }
    }

    //deleting user using delete method

    function deleteUser1(Request $request)
    {
        $user = User::find($request->id);
        $result = $user->delete();
        if ($result) {
            return ["result" => "User Deleted"];
        } else {
            return ["result" => "Error Occured"];
        }
    }

    //deleting user using destroy method
    function deleteUser2(Request $request)
    {
        $result = User::destroy($request->id);
        if ($result) {
            return ["result" => "User Deleted"];
        } else {
            return ["result" => "Error Occured"];
        }
    }

    //searching user
    function searchUser(Request $request)
    {
        $user = User::find($request->id);
        return $user;
    }

    // function searchUserByName(Request $request){
    //     $user = User::find($request->name);
    //     return $user;
    // }

    function searchUserByName(Request $request)
    {
        $users = User::where('name', 'like', "%$request->name%")->get();

        if ($users->isNotEmpty()) {
            return [
                "result" => "User Found",
                "data" => $users
            ];
        }

        return ["result" => "No record found"];
    }
}
