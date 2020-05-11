<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = auth()->user()->notifications;
        $images = auth()->user()->images;
        if(Auth::user()->hasRole('student')){
            $group = Auth::user()->groups->first();
            $subjects = Group::find($group->id)->subjects()->get();
            return view('home', compact('images','notifications','group','subjects'));
        }
            return view('home', compact('images','notifications'));
    }
}
