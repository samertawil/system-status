<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthTokensController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['show']);
    }

    public function index()
    {
        $data = auth::guard('sanctum')->user();
        return $data->currentAccessToken();

        return response::json($data, 202);
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
            'device_name' => 'required',
            // 'permissions' => 'array',
        ]);

        $user = User::where('user_name', $request->user_name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->device_name, ['*']);
            return Response::json([
                'token' =>  $token->plainTextToken,
                'user' => $user,
            ], 201);
        }

        return Response::json([
            'message', 'invalid creditioanl',
        ], 401);
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
