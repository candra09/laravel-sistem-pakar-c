<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        return view('home-user');
    }
    function home()
    {
    //     return view('halamanawal');

    // return redirect()->intended(route('dashboard.index'));
        $user = Auth::user();
       $userRoles = $user->roles->pluck('title')->implode(', ');

    return view('home-user', compact('user', 'userRoles'));
    }
}
