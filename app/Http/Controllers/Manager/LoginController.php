<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = "/home";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function showLoginForm()
    {

        return view('manager.login');
    }

    public function username()
    {
        return 'email';
    }*/

    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        //check authentication
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'role' => $request->get('role'), 'status' => 'Active'])) {
        return redirect('manager/dashboard')->withSuccess('Vous êtes connecté avec succès');
        } else {
            return redirect()->back()->withInput()->withErrors("Ces informations d'identification sont incorrectes");
        }
    }
}
