<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
public function getPost()
    {
        $data = Post::with('children.children')->whereParentId(null)->get()->toArray();
        return response()->json([
            "message"=> "Data recieved",
            "data" => ["hiv_details" => $data]
        ]);
    }
}
