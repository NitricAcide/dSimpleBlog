<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use \Illuminate\Http\Response;

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

    public function username() // overrides the username() method in the AuthenticatesUsers
    {   # get input value
        $loginValue = request('username');
        $this->username = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username'; // if the login value is an email, use the email field, otherwise use the username field
        request()->merge([$this->username => $loginValue]); // merge the username or email field into the request
        return property_exists($this, 'username') ? $this->username : $username; // return the username or email field
    }

    public function logout(Request $request)
    {
        $this->guard()->logout(); // logout the user

        $request->session()->invalidate(); // invalidate the session

        $request->session()->regenerateToken(); // regenerate the CSRF token

        return redirect('/homepage'); // redirect the user back to the homepage
    }
}
