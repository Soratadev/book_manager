<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    protected array $validated_data = [

            'title' => 'required|string|max:55',
            'author' => 'required|string|max:55',
            'publisher' => 'max:55',
            'isbn' => 'required|integer|digits:13',
            'publication_year' => 'integer|digits:4',
            'pages' => 'integer|min:1',
            'finished' => 'required'
        ];

    public function index(): View
    {
        //$books = Book::get(); //select * from reviews
        $books = Book::where('user_id', auth()->user()?->id)->get();

        return view('books.index', ['books' => $books]);
    }

    public function create(): View
    {
        return view('books.add_edit');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->validated_data);

        Book::create([
            'user_id'=> $request->user()->id,
            'title'=> $validated['title'],
            'author'=> $validated['author'],
            'genre'=> $request->get('genre'),
            'publisher'=> $validated['publisher'],
            'isbn'=> $validated['isbn'],
            'publication_year'=> $validated['publication_year'],
            'pages'=> $validated['pages'],
            'finished'=> $validated['finished'],
        ]);
        session()->flash('success','Book added successfully');
        return redirect()->route('books.index');
    }

    public function edit(Book $book): View
    {
        return view('books.add_edit')->with('book',$book);
    }

    public function update(Request $request,Book $book): RedirectResponse
    {
        $validated = $request->validate($this->validated_data);

        $book->update($validated);
        session()->flash('updated','Book updated successfully');
        return redirect()->route('books.index');
    }

    public function show(Book $book): View
    {
        return view('books.show')->with('book',$book);
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        session()->flash('deleted','Book deleted successfully');
        return redirect()->route('books.index');
    }

}
