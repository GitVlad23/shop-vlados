<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('/admin/login');
    }

    public function login_process(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required'
        ]);

        if(@auth('admin')->attempt($data))
        {
            return redirect()->route('panel_index');
        }

        return redirect()->route('admin_login')->withErrors(['email' => 'Вы ввели не верные данные!']);
    }

    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('main');
    }
}
