<?php
# @Date:   2021-02-25T16:24:31+00:00
# @Last modified time: 2021-03-10T14:44:22+00:00




namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Role;

class PassportController extends Controller
{
  public function register(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'name' => 'required|min:3',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6',
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
      }

      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password)
      ]);

      $user->roles()->attach(Role::where('name', 'user')->first());

      $token = $user->createToken('sparetime-api')->accessToken;
      return response()->json(['token' => $token], 200);
  }

  public function login(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'email' => 'required|email|exists:users',
          'password' => 'required|min:6',
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->errors()], 401);
      }

      $credentials = [
          'email' => $request->email,
          'password' => $request->password
      ];
      if (auth()->attempt($credentials)) {
          $user = auth()->user();
          $token = $user->createToken('sparetime-api')->accessToken;
          return response()->json([
              'name' => $user->name,
              'email' => $user->email,
              'token' => $token
          ], 200);
      }
      else {
          return response()->json(['error' => 'Unauthorised'], 401);
      }
  }

  public function user()
  {
      return response()->json(['user' => auth()->user()], 200);
  }

  public function logout(Request $request)
  {
      $request->user()->token()->revoke();
      return response()->json(['message' => 'Successfully logged out'], 200);
  }
}
