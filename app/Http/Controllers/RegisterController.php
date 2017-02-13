<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegister()
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        return view('register');
    }

    public function postRegister(Request $request)
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');

        $this->validate($request, [

            'username' => 'required|max:255',
            'password' => 'required|min:6',
            'user_type' => 'required'

        ]);

        try {
            if (!$request->user_type == 'admin' && !$request->user_type == 'basic') {
                throw new \Exception();
            }
            \DB::transaction(function () use ($request) {
//                dd($request->all());
                $password = bcrypt($request->password);
                User::create([
                    'username' => $request->username,
                    'password' => $password,
                    'role' => $request->user_type
                ]);
            });
        } catch (\Exception $e) {
            session()->flash('register_error', 1);
            return redirect()->back()->withInput();
        }
        session()->flash('register_success', 1);
        return redirect('user_list');
    }
}
