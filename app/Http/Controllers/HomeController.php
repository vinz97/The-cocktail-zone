<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raccolta;




class HomeController extends Controller
{
     /**
     * Where to redirect users after login.
     *
     * @param Request $response
     */



    /**
     * Create a new controller instance.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


}
