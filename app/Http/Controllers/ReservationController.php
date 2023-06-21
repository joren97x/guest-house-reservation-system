<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function store(Request $request) {

        Reservation::create($request->all());

        return redirect('dashboard/reservations');
    }

    public function delete(Request $request) {

        Reservation::destroy($request->id);

        return response()->json(['response' => 'EURT BHIE!', 'request' => $request->all()]);

    }

    public function cancel(Request $request) {

        $reservation = Reservation::find($request->id);
        $reservation->status = 'cancelled';
        $reservation->save();
        return response()->json(['response' => "ABOT DIRE!", 'request' => $request->all()]);

    }

}
