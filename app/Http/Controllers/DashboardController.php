<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        $authorBooks = Author::find(Auth::User()->id);
        if ($authorBooks->books->isEmpty()) {
            return view('dashboard', ['authorBooks' => null]);
        }
        return view('dashboard', ['authorBooks' => $authorBooks->books]);
    }
}
