<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request) {

        $result = GuestHouses::where('room_name', 'LIKE', '%' . $request->search . '%')->get();

        return response()->json(['response' => true, "result" => $result]);
    }
}
