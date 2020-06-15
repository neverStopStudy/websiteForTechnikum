<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesInformationController extends Controller
{
    public function history(){
        return view("pages.information.history");
    }

    public function license(){
        return view("pages.information.license");
    }

    public function specialty(){
        return view("pages.information.specialty");
    }

    public function administration(){
        return view("pages.information.administration");
    }
    
    public function teachers(){
        return view("pages.information.teachers");
    }
}
