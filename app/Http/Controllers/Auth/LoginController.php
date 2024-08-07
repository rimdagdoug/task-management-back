<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{ 
    /**
     * Handle the incoming request.
     *
     *
     */
    public function __invoke(LoginRequest $request)
    {
        // $user = User::where('email', $request->email)->first();

        if (!auth()->attempt($request->only(['email', 'password']))){
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered are incorrect.']
            ]);
        }
    }
}
