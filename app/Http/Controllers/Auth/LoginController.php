<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.layoutlogin');
    }

    protected function authenticated(Request $request, $user)
    {
        $id = $user['id'];
        $name = $user['name'];
        $email = $user['email'];
        $role_id = $user['role_id'];
        $satker_id = $user['satker_id'];

        $request->session()->put('id',$id);
        $request->session()->put('name',$name);
        $request->session()->put('email',$email);
        $request->session()->put('role_id',$role_id);
        $request->session()->put('satker_id',$satker_id);

    }
}
