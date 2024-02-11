<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admins_name = $request->input('email');
        $password = $request->input('password');

        if (Auth::guard('admin')->attempt(['email' => $admins_name, 'password' => $password])) {
            return redirect()->route('admin.dashboard')->withSuccess('Vous êtes connecté avec succès');
        } else {
            Auth::guard('admin')->logout();
            return redirect()->back()->withInput()->withError("Ces informations d'identification sont incorrectes.");
        }
    }
}
