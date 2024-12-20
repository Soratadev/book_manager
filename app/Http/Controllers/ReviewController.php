<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReviewController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request): View
    {
        $reviews = Review::own($request->filter)->popular($request->filter)->get(); //select * from reviews
        return view('reviews.index',['reviews'=>$reviews]);
    }

    public function create(): View
    {
        return view('reviews.create_edit');
    }

    public function store(Request $request): RedirectResponse
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
            'likes' => 0
        ]);
        session()->flash('success','Review creada correctamente');
        return redirect()->route('reviews.index');
    }
    public function edit(Review $review): View
    {
        $this->authorize('update', $review);
        return view('reviews.create_edit',['review'=>$review]);
    }
    public function update(Request $request, Review $review): RedirectResponse
    {
        $this->authorize('update', $review);
        $validated = $request->validate([
            'title' => 'required|string|max:55',
            'body' => 'required|string|max:1055',
        ]);
        $review->update($validated);
        session()->flash('updated','Review modificada correctamente');
        return redirect()->route('reviews.index');
    }
    public function show(Review $review): View
    {
        return view('reviews.show',['review'=>$review]);
    }
    public function delete(Review $review): RedirectResponse
    {
        $this->authorize('delete', $review);
        $review->delete();
        session()->flash('deleted','Review eliminada correctamente');
        return redirect()->route('reviews.index');
    }
    public function liked(Request $request, Review $review): RedirectResponse
    {
        $review->users_who_like()->toggle($request->user()->id);
        $review->users_who_like()->count();
        $review->update(['likes'=> $review->users_who_like()->count()]);

        return redirect()->route('reviews.show',['review'=>$review]);
    }


}
