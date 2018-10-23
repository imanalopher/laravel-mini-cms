<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        dump("success!!!");
        dump(Auth::user());
        die;
        return view('admin');
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
