<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // public function login(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
    //         $user = Auth::user();
    //         $token = Str::random(60);
    //         $user->token = $token;
    //         $user->token_exp = now()->addDays(30);
    //         $user->save();
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Login successful',
    //             'token' => $token,
    //             'user' => $user,
    //         ], 200)->header('Authorization', 'Bearer ' . $token);
    //     }
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Invalid email or password',
    //     ], 401);
    // }

    public function login(Request $request)
    {
        // Validate request

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check credentials
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }

        // Create token using Sanctum
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => Str::random(60),
        ]);



        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'token' => $user->token,
            'user' => $user,
        ], 201);
    }
}