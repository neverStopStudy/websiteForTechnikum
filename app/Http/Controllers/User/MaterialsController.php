<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\MaterialRequest;
use App\Material;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{

    public function showForStudent($id)
    {
        $material = Material::find($id);
        return view('user.showMaterials', compact('material'));
    }
    
}
