<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Utente;

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
     * @param Request $response
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $username= $request["username"];
        $pass= $request["password"];
     //   $array= \DB::select("SELECT username FROM UTENTE WHERE username=\"$username\" AND psw= \"$pass\" ");
        $array= Utente::where("username", $username)->where("psw", $pass)->count();
      //  print_r($array);

        if ($array > 0) {
            \Session::put("username", $username);
            return redirect("home");
        }
        else {
            $error= true;
            return view("login")->with("error", $error);
        }

    }




}

