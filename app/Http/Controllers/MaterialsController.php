<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Material;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.materials.index', ['materials' => Material::with('subject')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materials.create', ['subjects' => Subject::all()]);
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
            'name' => $request->name,
            'text' =>  $request->text,
            'link' =>  $path,
        ]);

        return redirect()->route('material.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return view('admin.materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $subjects = Subject::all();
        return view('admin.materials.edit', compact('material','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialRequest $request, Material $material)
    {
        $material = Material::find($material->id);
        $material->fill($request->all());
        $material->save();
        return redirect()->route('material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        Material::destroy($material->id);
        return redirect()->route('material.index');
    }
}
