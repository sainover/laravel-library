<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('books.index', [
            'books' => Book::search($request->input('query'))->paginate(100),
        ]);
    }
}
