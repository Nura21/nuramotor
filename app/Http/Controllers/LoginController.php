<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login()
    {
        if (auth()->check()) {
            return to_route('dashboard');
        }

        return view('auth.login');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        if (auth()->check()) {
            return to_route('dashboard');
        }

        return view('auth.register');
    }

    public function store(UserRequest $request)
    {
        // DB::beginTransaction();
        try{
            $role = RoleEnum::PENGGUNA;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => now(),
                'password' => Hash::make($request->password),
                'role' => $role,
            ]);
            
            $user->userDetail()->create([
                'user_id' => $user->id,
                'ktp' => $request->ktp,
                'kk' => $request->kk,
            ]);   
            
            Auth::login($user);
            
            return to_route('dashboard');
        } catch (\Exception $e) {
            // dd($e);
			// DB::rollBack();

			return redirect('register');
		}
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
