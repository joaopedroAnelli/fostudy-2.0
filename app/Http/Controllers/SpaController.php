<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guest()) {
            return view('auth.login');
        }

        return view('layouts.master');
    }

}