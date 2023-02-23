<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginpage()
    {
        return view('login');
    }

    public function userlogin(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('home');
            }
            else{
                return redirect('login')->with('error','Password not matched');
            }
        }
        else{
            return redirect('login')->with('error','User not found!');
        }
    }

    public function registerpage()
    {
        return view('register');
    }

    public function userregister(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | email',
            'password' => 'required|confirmed|min:6'
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('login')->with('success','User created successfully.');
    }


}
