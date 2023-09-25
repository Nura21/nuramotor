<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\UserRequest;
use App\Jobs\SendConfirmationEmail;
use App\Mail\ConfirmationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

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
        DB::beginTransaction();
        try{
            $role = RoleEnum::PENGGUNA;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $role,
                'remember_token' => Str::random(40)
            ]);

            SendConfirmationEmail::dispatch($user);
            // new ConfirmationEmail($user);
            // $this->sendEmail($user);
            
            $user->userDetail()->create([
                'user_id' => $user->id,
                'ktp' => $request->ktp,
                'kk' => $request->kk,
            ]);   

            DB::commit();
            
            Auth::login($user);
            
            return to_route('dashboard');
        } catch (\Exception $e) {
			DB::rollBack();

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

    public function confirmEmail($token)
    {
        try{
            $user = User::where('remember_token', $token)->firstOrFail();

            if (!$user) {
                return redirect()->route('login')->with('error', 'Invalid confirmation token.');
            }
    
            $user->email_verified_at = now();
            $user->remember_token = null;
            $user->save();
            
            return redirect()->route('login')->with('success', 'Email confirmed successfully.');
        }catch(\Exception $e){
            return redirect()->route('login')->with('error', 'Invalid confirmation token.');
        }
    }

}
