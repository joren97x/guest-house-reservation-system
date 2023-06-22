<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use App\Models\Reservation;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

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

    public function sort(Request $request, $sort) {
        $query = Reservation::query();

        switch($sort) {
            case 'pending':
                $query->where('status', 'pending');
                break;
            case 'cancelled':
                $query->where('status', 'cancelled');
                break;
            case 'approved':
                $query->where('status', 'approved');
                break;
            case 'all':
                break;
        }

        if(auth()->user()->role == "admin") {
            $reservations = $query->with('guest_house')->get();
        }
        else {
            $query->where('user_id', auth()->user()->id);
            $reservations = $query->with('guest_house')->get();
        }

        return view('dashboard.reservation',(['reservations' => $reservations]));
    }

}
