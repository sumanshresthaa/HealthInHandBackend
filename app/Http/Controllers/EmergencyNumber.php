<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emergencycontact;

class EmergencyNumber extends Controller
{
    //
    function numberList()
    {
        $data = emergencycontact::all();
        return response()->json([
            "message"=> "Data recieved",
            "data" => ["hotline" => $data]
        ]);

    }
}
