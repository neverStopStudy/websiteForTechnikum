<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\MaterialRequest;
use App\Material;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.materials.index', ['materials' => Material::with('subject')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.materials.create', ['subjects' => Subject::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialRequest $request)
    {
        $file = $request->file('link');
        $path = $file->storeAs('files', $file->getClientOriginalName());
 
        Material::create([
            'subject_id' => $request->subject_id,
            'user_id' => $request->user_id,
            'name' => $request->name,
            'text' =>  $request->text,
            'link' =>  $path,
        ]);

        return redirect()->route('teacher.material.ownmaterial');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return view('teacher.materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        $subjects = Subject::all();
        return view('teacher.materials.edit', compact('material','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialRequest $request, $id)
    {
        $material = Material::find($id);
        $material->fill($request->all());
        $material->save();
        return redirect()->route('teacher.material.ownmaterial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Material::destroy($id);
        return redirect()->route('teacher.material.ownmaterial');
    }

    public function ownmaterials(){        
        return view('teacher.materials.index', ['materials' => Auth::user()->materials()->with('subject')->paginate(5)]);
    }
    
}
