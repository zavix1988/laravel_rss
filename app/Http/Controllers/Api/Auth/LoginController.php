<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)) {
            return response()->json(['error' => 'unauthorized'], 200);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(2);
        $token->save();

        $success = [
            'token' => $tokenResult->accessToken,
            'url' => session()->pull('previousUrl')
        ];

        Auth::login($user);

        return response()->json(['success' => $success]);
    }

    public function logout()
    {

    }
}
