<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //

    public function store(Request $request, $guesthouse_id) {

        $request->validate([
            'rating' => 'required'
        ]);

        Rating::create([
            'user_id' => auth()->user()->id,
            'room_id' => $guesthouse_id,
            'review' => $request->review,
            'rating' => $request->rating
        ]);

        return back()->with('message', 'Ratings and review added.');
    }

}
