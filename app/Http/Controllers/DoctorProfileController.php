<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorProfile;

class DoctorProfileController extends Controller
{
    //
    public function getDetailsOfDoctor()
    {
        $data = DoctorProfile::all();
        return response()->json([
            "message"=> "Data recieved",
            "data" => ["doctor_details" => $data]
        ]);
    }
}
