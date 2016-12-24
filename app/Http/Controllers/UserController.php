<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function user_list()
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        return view('user_list');
    }

    public function ajax_user_list()
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        return Datatables::of(\DB::table('users')->select('id', 'username', 'role')->get())->make(true);
    }

    public function edit($id)
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        return view('user_edit', compact('id'));
    }

    public function update($id)
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        User::where('id', $id)->update([
            'password' => bcrypt(request('password'))
        ]);
        session()->flash('password_update', 1);
        return view('user_list');
    }
}
