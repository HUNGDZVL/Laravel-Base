<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return view("dashboard-crm");
        return abort(404);
    }

    public function root()
    {
        return view('index');
    }
}