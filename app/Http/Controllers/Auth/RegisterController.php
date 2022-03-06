<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\Utente;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

function register(Request $request) {
    $nome= $request["name"];
    $cognome= $request["surname"];
    $email= $request["email"];
    $residenza= $request["residenza"];
    $sitoweb= $request["sitoweb"];
    $username= $request["username"];
    $password= $request["password"];
    $user= new Utente;
    $user->nome= $nome;
    $user->cognome= $cognome;
    $user->email= $email;
    $user->residenza= $residenza;
    $user->sitoweb= $sitoweb;
    $user->username= $username;
    $user->psw= $password;
    $user->save();
    \Session::put("username", $username);
    return redirect("home");

}

    function checkutente($user) {
        $array= Utente::where("username", $user)->count();
        echo json_encode($array);

    }


}
