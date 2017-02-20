<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        $hostname = fetchHostByAddr();

        return view('auth.register')->with('hostname', $hostname);
    }

    public function register(Request $request)
    {
        // get read-only validation data
        $hostname = fetchHostByAddr();
        $slug = generateSlug($request->name);
        $request->merge(['hostname' => $hostname, 'slug' => $slug]);

        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'nullable|unique:users',
            'slug' => 'required|unique:users',
            'hostname' => 'required|unique:users'
        ]);

        Auth::login(User::create($request->all()));

        flash()->success("$hostname has been registered!");

        return redirect('newhire');
    }

    public function login()
    {
        $hostname = fetchHostByAddr();

        $user = User::where('hostname', $hostname)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('newhire');
        }
        else {
            return redirect('register');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
