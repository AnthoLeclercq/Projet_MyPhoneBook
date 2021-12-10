<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use App\Models\collaborateur;
use Illuminate\Http\Request;

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
        $data_coll = collaborateur::all();
        $data_ent = entreprise::all();
        return view('home', ['collaborateurs' => $data_coll], ['entreprises' => $data_ent]);
    }
}
