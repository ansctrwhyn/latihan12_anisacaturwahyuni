<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
   public function __construct()
   {
      $this->middleware("auth:api", ['except' => ['login', 'register']]);
   }

   public function login(Request $request)
   {
      $request->validate([
         'email' => 'required|email',
         'password' => 'required|string|min:6'
      ]);

      $credentials = request(['email', 'password']);

      if (!$token = auth()->attempt($credentials)) {
         return response()->json(['error' => 'Unauthorized'], 401);
      }

      return response()->json([
         'access_token' => $token,
         'token_type' => 'bearer',
         'expires_in' => auth()->factory()->getTTL()
      ], 200);
   }

   public function register(Request $request)
   {
      $request->validate([
         'name' => 'required|string',
         'email' => 'required|email',
         'password' => 'required|string|min:6'
      ]);

      $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password)
      ]);

      return response()->json([
         'success' => true,
         'user' => $user
      ]);
   }

   public function me()
   {
      return response()->json(auth()->user(), 200);
   }

   public function logout()
   {
      // auth()->logout();
      // return response()->json(['message' => 'Successfully logged out'], 200);

      $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

      if ($removeToken) {
         //return response JSON
         return response()->json([
            'success' => true,
            'message' => 'Logout Berhasil!',
         ]);
      }
   }
}
