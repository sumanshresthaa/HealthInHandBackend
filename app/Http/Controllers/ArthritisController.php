<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arthritis;

class ArthritisController extends Controller
{
    //
    public function getDetailsOfArthritis()
    {
        $data = Arthritis::with('children.children')->whereParentId(null)->get()->toArray();
        return response()->json([
            "message"=> "Data recieved",
            "data" => ["arthritis_details" => $data]
        ]);
    }
}
