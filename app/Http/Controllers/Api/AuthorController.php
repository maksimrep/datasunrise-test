<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{

    /**
     * Get Author info
     *
     * @return \Illuminate\Http\Response
     */
    public function getAuthor($authorId)
    {
        $author = Author::find($authorId);
        $authorResponse['author_info'] = $author;
        $authorResponse['books'] = $author->books;
        return response()->json($authorResponse);
    }

}
