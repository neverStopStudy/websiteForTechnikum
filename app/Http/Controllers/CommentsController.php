<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request){

        Comment::create($request->all());
        return redirect()->back();
    }
}
