<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
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
     * Show the author info page
     *
     * @return \Illuminate\Http\Response
     */
    public function index($authorId)
    {
        $author = Author::find($authorId);

        return view('author.page', ['author' => $author]);
    }

    /**
     * Create new author
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {

    }

    /**
     * Edit selected author
     *
     * @param $bookId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($bookId)
    {

    }

    /**
     * Update book
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

    }

    /**
     * Need to implement remove function
     *
     */
    public function remove()
    {

    }
}
