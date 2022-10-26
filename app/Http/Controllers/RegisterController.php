<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function signUp(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required'],
            'c_password' => ['required', 'same:password'],
        ]);

        if ($validator->fails()) {
            return Response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $request['password'] = Hash::make($request['password']);

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $tokenResult = $user->createToken('personal Access Token')->accessToken;
        $data["user"] = $user;
        $data["tokenType"] = 'Bearer';
        $data["access_token"] = $tokenResult;

        return response()->json($data, Response::HTTP_OK);

    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            throw new AuthenticationException();
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $data["user"] = $user;
        $data["tokenType"] = 'Bearer';
        $data["access_token"] = $tokenResult->accessToken;

        return response()->json($data, Response::HTTP_OK);

    }



    public function logout(){
        Auth::user()->token()->revoke();

        return response()->json("logged out", Response::HTTP_OK);

    }
}
