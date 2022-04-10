<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use function PHPUnit\Framework\isTrue;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|string'

        ]);

        $user = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),

        ]);

        //Creating a token

        $token = $user->createToken('healthInHandToken')->plainTextToken;
        $isTrue = true;

        $response = [
            'created' => $isTrue,
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }


    public function logout()
    {
        

       // auth()->user()->tokens()->delete(); 
        Auth::logout();    
        return response(['message' => 'Logged out successfully']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            
            'email'=>'required|email|max:191',
            'password'=>'required|string'

        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            return response(['message'=>'Invalid Credential'], 401);
        }
        else
        {
        $token = $user->createToken('healthInHandTokenLogin')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ]; 
        return response($response, 200);
 

         }

        



    }
}
