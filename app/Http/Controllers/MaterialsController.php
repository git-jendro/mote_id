<?php

namespace App\Http\Controllers;

use App\Material;
use App\Product;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Material::all();
        return view('materials.index', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50'
        ],[
            'name.required' => 'Nama material harus diisi !',
            'name.min:3' => 'Nama material minimal 3 karakter !',
            'name.max:50' => 'Nama material maximal 50 karakter !',
        ]);
        
        try {
            $data = new Material;
            $data->id = $this->generateUUID();
            $data->name = $request->name;
            $data->save();
    
            return redirect()->route('material.index')->with('success', 'Data material '.$data->name.' berhasil ditambahkan !');
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->with('danger', 'Maaf terjadi kesalahan !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('material.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('material.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name-'.$id => 'required|min:3|max:50'
        ],[
            'name-'.$id.'.required' => 'Nama material harus diisi !',
            'name-'.$id.'.min:3' => 'Nama material minimal 3 karakter !',
            'name-'.$id.'.max:50' => 'Nama material maximal 50 karakter !',
        ]);
        
        try {
            $data = Material::findOrFail($id);
            $data->name = $request['name-'.$id];
            $data->save();
            return redirect()->route('material.index')->with('update', 'Data material '.$data->name.' berhasil diubah !');
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->with('danger', 'Maaf terjadi kesalahan !');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Material::findOrFail($id);
            Product::where('material_id', $id)
            ->update([
                'material_id' => null,
            ]);
            Material::destroy($id);

            return redirect()->route('material.index')->with('danger', 'Data material '.$data->name.' berhasil dihapus !');
        } catch (\Throwable $th) {
            return redirect()->route('material.index')->with('danger', 'Maaf terjadi kesalahan   !');
        }
    }
}
