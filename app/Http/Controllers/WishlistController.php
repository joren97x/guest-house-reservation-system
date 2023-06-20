<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //

    public function index() {

        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();

        foreach($wishlists as $wishlist) {
            $wishlist->guesthouse = GuestHouses::find($wishlist->room_id);
        }

        return view('guesthouses.wishlist', ['wishlists' => $wishlists]);
    }

    public function store(Request $request) {

        Wishlist::create($request->all());
        return response()->json(['response' => $request->all()]);
    }

    public function destroy(Request $request) {

        $wishlist = Wishlist::find($request->id);
        $wishlist->delete();

        return response()->json(['response' => "DELETED NA PRE"]);
    }

}
