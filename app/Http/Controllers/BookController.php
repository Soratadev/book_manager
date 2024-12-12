<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::get(); //select * from reviews
        return view('books.index',['books'=>$books]);
    }

    public function add(): View
    {
        return view('books.add');
    }

    public function store(Request $request)
    {
        Book::create([
            'user_id'=> $request->user()->id,
            'title'=> $request->get('title'),
            'author'=> $request->get('author'),
            'genre'=> $request->get('genre'),
            'publisher'=> $request->get('publisher'),
            'isbn'=> $request->get('isbn'),
            'publication_year'=> $request->get('publication_year'),
            'pages'=> $request->get('pages'),
            'finished'=> $request->get('finished'),


        ]);
        return redirect()->route('books.index');
    }

}
