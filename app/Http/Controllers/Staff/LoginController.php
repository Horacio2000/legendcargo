<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

    use AuthenticatesUsers;

    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        //check authentication 
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'role' => $request->get('role'), 'status' => 'Active'])) {
        return redirect('staff/dashboard')->withSuccess('Vous êtes connecté avec succès');
        } else {
            return redirect()->back()->withInput()->withErrors("Ces informations d'identification sont incorrectes");
        }
    }

}
