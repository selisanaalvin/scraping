<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'c_password'=>'required|same:password'
        ]);
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        $accesstoken = $user->createToken('token')->accessToken;
        return response()->json(['user'=> $request->name, 'token'=>$accesstoken]);
    }

    public function login(Request $request) {
        $validatedData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if (!auth()->attempt($validatedData)) {
            return response()->json('Login failed!', 244);
        }
        $user = User::where('email', $request->email)->first();
        $accesstoken = $user->createToken('token')->accessToken;
        return response()->json(['user' => auth()->user(), 'access_token' => $accesstoken], 200);
    }
    public function checkifauthenticated(Request $request) {
        return response()->json('authenticated', 200);
    }

    public function logout(Request $request) {
        Auth::user()->token()->revoke();
        return response()->json('logout successfully', 200);
    }
}
