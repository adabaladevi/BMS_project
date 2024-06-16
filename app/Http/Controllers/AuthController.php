<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\User; 

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function authenticate(Request $request){ 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->user_type == 1) {
                return redirect()->route('dashboard.admin');
            } elseif (Auth::user()->user_type == 2) {
                return redirect()->route('dashboard.user');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email Address or Password is wrong');
        }
    }
    
    public function signup(){
        return view('auth.register');
    }
    
    public function createUser(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_no' => 'required',
            'password' => 'required',
          //  'password_confirmation' => 'required'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_no' => $request->get('phone_no'),
            'password' => Hash::make($request->get('password')),
            'user_type' => 2
        ]);

        $user->save();

        return redirect()->route('login');
    }
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
