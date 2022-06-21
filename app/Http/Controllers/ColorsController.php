<?php

namespace App\Http\Controllers;

use App\Color;
use App\ProductColor;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Color::all();

        return view('colors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colors.create');
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
            'name' => 'required|regex:/^[a-zA-Z ]*$/|max:12',
        ], [
            'name.required' => 'Nama warna harus diisi !',
            'name.regex' => 'Nama warna harus berupa huruf !',
            'name.max' => 'Nama warna maximal 12 karakter !',
        ]);

        try {
            $data = new Color;
            $data->id = $this->generateUUID();
            $data->name = $request->name;
            $data->save();

            return redirect()->route('warna.index')->with('success', 'Data warna ' . $data->name . ' berhasil ditambahkan !');
        } catch (\Throwable $th) {
            return redirect()->route('warna.index')->with('danger', 'Maaf, terjadi kesalahan !');
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
        return redirect()->route('warna.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('warna.index');
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
            'name-'.$id => 'required|regex:/^[a-zA-Z ]*$/|max:12',
        ], [
            'name-'.$id.'.required' => 'Nama warna harus diisi !',
            'name-'.$id.'.regex' => 'Nama warna harus berupa huruf !',
            'name-'.$id.'.max' => 'Nama warna maximal 12 karakter !',
        ]);

        try {
            $data = Color::find($id);
            $data->name = $request['name-'.$id];
            $data->save();

            return redirect()->route('warna.index')->with('update', 'Data warna ' . $data->name . ' berhasil diubah !');
        } catch (\Throwable $th) {
            return redirect()->route('warna.index')->with('danger', 'Maaf, terjadi kesalahan !');
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
            $data = Color::find($id);
            ProductColor::where('color_id', $id)->delete();
            Color::destroy($id);
            
            return redirect()->route('warna.index')->with('danger', 'Data warna '.$data->name.' telah dihapus !');
        } catch (\Throwable $th) {
            return redirect()->route('warna.index')->with('danger', 'Maaf, terjadi kesalahan !');
        }
    }
}
