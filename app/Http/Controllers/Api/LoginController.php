<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserReqisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
class LoginController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([

            'email' => 'required',
            'password' => 'required',

        ]);

        $user = User::where('email', '=', $request->post('email'))->first();
        if ($user && Hash::check($request->password, $user->password)) {

            $token = $user->createToken($request->userAgent(), ['categories', 'tags','articles']);

            return Response::json([
                'message' => 'Authenticated',
                'access_token' => $token->plainTextToken,
            ]);
        }

        return Response::json([
            'message' => 'Invalid email and password combination',
        ], 401); //401 not auth
    }

    public function register(UserReqisterRequest $request){
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        $token=$user->createToken('access_token')->plainTextToken;
        $respons=[
            'user'=>$user,
            'token'=>$token
        ];
        return $respons;
    }

    public function tokens()
    {
        $user = Auth::guard('sanctum')->user();
        return $user->tokens;
    }


    public function logout(Request $request){
        auth()->user()->tokens()->delete();
    }


}
