<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\User;

class AdminController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaBreadcrumb = json_encode([
            ['titulo' => 'Admin', 'url' =>""]
        ]);
        $artigos  = Artigo::select()->count('*');
        $usuarios = User::select()->count('*');
        $autores  = User::select()->where('autor', '=', 'S')->count('*');
        return view('admin', compact('listaBreadcrumb', 'artigos', 'usuarios', 'autores'));
    }
}
