<?php

namespace App\Http\Controllers;

use App\Models\TrClassPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'post_title' => 'required',
            'post_body' => 'required',
            'class_id' => 'required',
        ]);
        $data['created_by'] = $request->user()->id;

        $result = TrClassPost::create($data);
        $result['user_name'] = $request->user()->name;
        return $result;
    }
}
