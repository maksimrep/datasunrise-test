<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{

    /**
     * Array of rules for create/edit book form
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|min:3',
        'subtitle' => 'required|min:3',
        'isbn' => 'required',
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::class;
        $authors = $author::all()->pluck('name','id');
        return view('books.add.book', ['authors' => $authors, 'authorModel' => $author]);
    }

    /**
     * Create new book
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, $this->rules);
        $books = new Book;
        $books->title = $request->input('title');
        $books->subtitle = $request->input('subtitle');
        $books->isbn = $request->input('isbn');
        $books->save();
        $authors = $request->input('authors');
        $books->author()->attach($authors);

        $request->session()->flash('alert-success', 'Book successfully added');
        return redirect()->route("add.book");
    }

    /**
     * Edit selected book
     *
     * @param $bookId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($bookId)
    {
        $booksModel = Book::find($bookId);
        $authors = Author::all()->pluck('name','id');

        return view('books.edit.book', ['authors' => $authors, 'booksModel' => $booksModel]);
    }

    /**
     * Update book
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);
        $booksModel = Book::find($id);
        $booksModel->title = $request->input('title');
        $booksModel->subtitle = $request->input('subtitle');
        $booksModel->isbn = $request->input('isbn');
        $booksModel->save();
        $authors = $request->input('authors');
        $booksModel->author()->sync($authors);

        $request->session()->flash('alert-success', 'Book'. $booksModel->title .' successfully updated');
        return redirect()->route("dashboard");
    }

    /**
     * Need to implement remove function
     *
     */
    public function remove()
    {

    }
}
