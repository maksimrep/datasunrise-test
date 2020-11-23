<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;
use App\Models\Book;

class HomeController extends Controller
{

    /**
     * Show the application main page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();

        if ($books->isEmpty()) {
            $books = null;
        }
        if ($authors->isEmpty()) {
            $authors = null;
        }

        return view('main', ['books' => $books, 'authors' => $authors ]);
    }
}
