<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Faker\Provider\Image;

class GuestHouseController extends Controller
{
    //show all guest houses
    public function index() {
        //dd(request('search'));
        return view('guesthouses.index', [
            'guesthouses' => GuestHouses::latest()->filter(request(['search']))->get()
        ]);
    }

    //show singular guest house
    public function show(GuestHouses $id) {
        if(auth()->user()) {
            $wishlist = Wishlist::where('user_id', auth()->user()->id)
                            ->where('room_id', $id->id)
                            ->first();
            return view('guesthouses.show', ['guesthouse' => $id, 'wishlist' => $wishlist]);
            
        }
        else {
            return view('guesthouses.show', ['guesthouse' => $id]);
        }
    }

    //create guest house
    public function create() {
        return view('guesthouses.create');
    }

    public function payment(Request $request, GuestHouses $guesthouse) {
        return view('guesthouses.payment', ['guesthouse' => $guesthouse]);
    }

    public function edit(GuestHouses $guesthouse) {
        return view('guesthouses.edit', ['guesthouse' => $guesthouse]);
    }

    public function update(Request $request, GuestHouses $guesthouse) {
        $form = $request->validate([
            'room_name' => 'required',
            'room_details' => 'required',
            'room_location' => 'required',
            'room_price' => 'required',
            'room_image' => 'required'
        ]);

        $guesthouse->update($form);

        return view('guesthouses.show', ['guesthouse' => $guesthouse])->with('message', 'GUEST HOUSE UPDATED SUCCESSFULLY!');
        // return redirect('guesthouses.show', ['room' => $guesthouse])->with('message', 'Guest House Updated Successfully!');
    }

    public function destroy(GuestHouses $guesthouse) {
        $guesthouse->delete();
        return redirect('/')->with('message', "GUEST HOUSE DELETED SUCCESSFULLY!");
    }

    //store guest hoseu data 
    public function store(Request $request) {
        $houseImages = [];

        for ($i=0; $i < 10; $i++) { 
            $imageUrl = Image::imageUrl(265,265,'house', true);
            $houseImages[] = $imageUrl;
        }

        $request['room_image'] = json_encode($houseImages);

        $form = $request->validate([
            'room_name' => 'required',
            'room_details' => 'required',
            'room_location' => 'required',
            'room_price' => 'required',
            'room_image' => 'required'
        ]);

        GuestHouses::create($form);

        return redirect('/')->with('message', ' GUEST HOUSE ADDED SUCCESSFULLY!');

    }

    

}
