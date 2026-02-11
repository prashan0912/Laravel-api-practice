<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserAuthController extends Controller
{
    function login()
    {
        return "Login method called";
    }
    function signUp(Request $request)
    {

        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success ['token'] = $user->createToken('my-app-token')->plainTextToken;
        $user['name']=$user->name;
        return ['success' => true, "result" => $success, "msg" => "user Registered SUCCESSFULLY"];
    }
}
