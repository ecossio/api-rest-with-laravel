<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
	public function login(Request $request)
	{
		$this->validateLogin($request);
		if (Auth::attempt($request->only('email', 'password'))) {
			return response()->json([
				'token' => $request->user()->createToken($request->name)->plainTextToken,
				'message' => 'success'
			]);
		}

		return response()->json([
			'message' => 'Unauthorized'
		], Response::HTTP_UNAUTHORIZED);
	}

	public function validateLogin(Request $request)
	{
		return $request->validate([
			'email' => 'required|email',
			'password' => 'required',
			'name' => 'required'
		]);
	}
}
