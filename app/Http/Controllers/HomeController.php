<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function user(){
//        $user = User::all();
//        dd($user);
        $user = Auth::user();

//        dd($us);
        return view('admin.dashboard',['user' => $user]);
    }

    public function dangnhap()
    {
        return view('auth.dangnhap');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard',['user' => $user]);
    }
}
