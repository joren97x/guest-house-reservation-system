<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GuestHouses;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index() {

        $guesthouse_count = GuestHouses::count();
        $user_count = User::count();
        $reservation_count = Reservation::count();
        return view('dashboard.index', [
            'guesthouse_count' => $guesthouse_count,
            'user_count' => $user_count,
            'reservation_count' => $reservation_count
        ]);

    }

    public function show() {

        if(auth()->user()->role == "user") {
            $reservations = Reservation::where('user_id', auth()->user()->id)->oldest()->get();
            foreach($reservations as $res) {
                $res->guest_house = GuestHouses::find($res->room_id);
            }
            return view('dashboard.reservation', ['reservations' => $reservations]);
        }
        else {
            $reservations = Reservation::all();
            foreach($reservations as $res) {
                $res->guest_house = GuestHouses::find($res->user_id);
            }
            return view('dashboard.reservation', ['reservations' => $reservations]);
        }

    }

}
