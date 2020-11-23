<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Get Book list
     *
     * @return \Illuminate\Http\Response
     */
    public function getBookList()
    {
        $books = Book::all();
        foreach($books as $key => $val){
            $booksResponse[$key]['book'] = $val;
            $author = Author::find($val->id);
            $booksResponse[$key]['author'] = $author['name'];
        }
        if($booksResponse)
            return  response()->json($booksResponse);
        else
            return response()->json(null); 
    }

    /**
     * Get Book by id
     */
    public function byId($id)
    {
        $book = Book::find($id);
        if($book)
            return response()->json($book);
        else
            return response()->json(null);
    }

    /**
     * Update Book
     */
    public function update(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Delete Book by id
     */
    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if($book)
            $book->delete(); 
        else
            return response()->json(null); 
    }
}
