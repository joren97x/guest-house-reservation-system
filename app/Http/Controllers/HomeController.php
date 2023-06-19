<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index() {

        return view('dashboard.index');

    }

    public function show() {

        $reservations = Reservation::where('user_id', auth()->user()->id)->oldest()->get();

        foreach($reservations as $res) {
            $res->guest_house = GuestHouses::find($res->room_id);
        }

        return view('dashboard.reservation', ['reservations' => $reservations]);

    }

}
