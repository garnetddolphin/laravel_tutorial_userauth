<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // ←追記


class HomeController extends Controller
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
        $users = User::all(); // ←追記
        return view('home', ['users' => $users]); // ←修正
    }
}
