<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFilesController extends Controller
{
    public function download($path){
        return response()->download(public_path($path));
    }
}
