<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use App\Models\Rating;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Faker\Provider\Image;

use function PHPSTORM_META\type;

class GuestHouseController extends Controller
{
    //show all guest houses
    public function index() {
        //dd(request('search'));

        $guesthouses = GuestHouses::latest()->filter(request(['search']))->get();

        foreach($guesthouses as $gh) {
            $ratings = Rating::where('room_id', $gh->id)->get();
            $totalRatings = count($ratings);
            $sumRatings = $ratings->sum('rating');
            $averageRating = $totalRatings > 0 ? ($sumRatings / $totalRatings)+1 : 0;
            $gh->averageRating = number_format($averageRating, 2);
        }

        return view('guesthouses.index', [
            'guesthouses' => $guesthouses
        ]);
    }

    //show singular guest house
    public function show(GuestHouses $id) {
        if(auth()->user()) {
            $wishlist = Wishlist::where('user_id', auth()->user()->id)
                            ->where('room_id', $id->id)
                            ->first();
            
            $rating = Rating::where('user_id', auth()->user()->id)
            ->where('room_id', $id->id)
            ->first();

            $ratings = Rating::where('room_id', $id->id)->get();
            $totalRatings = count($ratings);
            $sumRatings = $ratings->sum('rating');
            $averageRating = $totalRatings > 0 ? ($sumRatings / $totalRatings)+1 : 0;
            $averageRating = number_format($averageRating, 2);

            foreach($ratings as $r) {
                $r->user = User::find($r->user_id);
            }

            return view('guesthouses.show', ['guesthouse' => $id,
                'wishlist' => $wishlist, 
                'rating' => $rating,
                'ratings' => $ratings,
                'averageRating' => $averageRating
            ]);
            
        }
        else {
            $ratings = Rating::where('room_id', $id->id)->get();
            $totalRatings = count($ratings);
            $sumRatings = $ratings->sum('rating');
            $averageRating = $totalRatings > 0 ? ($sumRatings / $totalRatings)+1 : 0;
            $averageRating = number_format($averageRating, 2);

            foreach($ratings as $r) {
                $r->user = User::find($r->user_id);
            }

            return view('guesthouses.show', ['guesthouse' => $id, 'ratings' => $ratings, 'averageRating' => $averageRating]);
        }
    }

    //create guest house
    public function create() {
        return view('guesthouses.create');
    }

    public function payment(Request $request, GuestHouses $guesthouse) {

        $ratings = Rating::where('room_id', $guesthouse->id)->get();
            $totalRatings = count($ratings);
            $sumRatings = $ratings->sum('rating');
            $averageRating = $totalRatings > 0 ? ($sumRatings / $totalRatings)+1 : 0;
            $averageRating = number_format($averageRating, 2);

        return view('guesthouses.payment', ['guesthouse' => $guesthouse, 'averageRating' => $averageRating, 'ratings' => $ratings]);
    }

    public function edit(GuestHouses $guesthouse) {
        return view('guesthouses.edit', ['guesthouse' => $guesthouse]);
    }

    public function update(Request $request, GuestHouses $guesthouse) {
        $houseImages = '';
        $uploadedFiles = $request->file('room_image');
        if($uploadedFiles == null) {
           $houseImages = $request->room_image;
        }
        else {
            for($i = 0; $i < count($uploadedFiles); $i++) {
                if($i != count($uploadedFiles)-1) {
                    $houseImages .= $uploadedFiles[$i]->getClientOriginalName().",";
                }
                else {
                    $houseImages .= $uploadedFiles[$i]->getClientOriginalName();
                }
            }
        }
        

        $form = $request->validate([
            'room_name' => 'required',
            'room_details' => 'required',
            'room_location' => 'required',
            'room_price' => 'required',
            'room_image' => 'required|min:5'
        ]);

        $form['room_image'] = $houseImages;

        $guesthouse->update($form);
        $rating = Rating::where('user_id', auth()->user()->id)
            ->where('room_id', $guesthouse->id)
            ->first();

            $ratings = Rating::where('room_id', $guesthouse->id)->get();
            $totalRatings = count($ratings);
            $sumRatings = $ratings->sum('rating');
            $averageRating = $totalRatings > 0 ? ($sumRatings / $totalRatings)+1 : 0;
            $averageRating = number_format($averageRating, 2);

            foreach($ratings as $r) {
                $r->user = User::find($r->user_id);
            }


        return view('guesthouses.show', [
            'guesthouse' => $guesthouse, 
            'rating' => $rating, 
            'ratings' => $ratings, 
            'averageRating' => $averageRating
        ])
        ->with('message', 'GUEST HOUSE UPDATED SUCCESSFULLY!');
        // return redirect('guesthouses.show', ['room' => $guesthouse])->with('message', 'Guest House Updated Successfully!');
    }

    public function destroy(GuestHouses $guesthouse) {
        $guesthouse->delete();
        return redirect('/')->with('message', "GUEST HOUSE DELETED SUCCESSFULLY!");
    }

    //store guest hoseu data 
    public function store(Request $request) {
        $houseImages = '';
        $uploadedFiles = $request->file('room_image');
        for($i = 0; $i < count($uploadedFiles); $i++) {
            if($i != count($uploadedFiles)-1) {
                $houseImages .= $uploadedFiles[$i]->getClientOriginalName().",";
            }
            else {
                $houseImages .= $uploadedFiles[$i]->getClientOriginalName();
            }
        }
        $form = $request->validate([
            'room_name' => 'required',
            'room_details' => 'required',
            'room_location' => 'required',
            'room_price' => 'required',
            'room_image' => 'required'
        ]);

        $form['room_image'] = $houseImages;

        GuestHouses::create($form);

        return redirect('/')->with('message', ' GUEST HOUSE ADDED SUCCESSFULLY!');

    }

    

}
