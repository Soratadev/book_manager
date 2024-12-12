<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::get(); //select * from reviews
        return view('reviews.index',['reviews'=>$reviews]);
    }

    public function create(): View
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:55',
            'body' => 'required|string|max:1055',
        ]);
        Review::create([
            'user_id'=> $request->user()->id, //auth()->user()->id,
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);
        return redirect()->route('reviews.index');
    }
}
