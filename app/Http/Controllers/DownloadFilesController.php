<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFilesController extends Controller
{
    public function index($path){
        // dd($path);
        return response()->download(public_path($path));
       
        //return response()->download($path);
        // return Storage::download($path);
    }
}
