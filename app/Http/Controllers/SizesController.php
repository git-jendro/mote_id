<?php

namespace App\Http\Controllers;

use App\ProductSize;
use App\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Size::all();

        return view('sizes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|regex:/^[a-zA-Z0-9 ]*$/|max:12',
            'initial' => 'required|regex:/^[a-zA-Z0-9 ]*$/|max:6',
        ], [
            'name.required' => 'Nama ukuran harus diisi !',
            'name.regex' => 'Nama ukuran harus berupa huruf atau angka !',
            'name.max' => 'Nama ukuran maximal 12 karakter !',
            'initial.required' => 'Inisial ukuran harus diisi !',
            'initial.regex' => 'Inisial ukuran harus berupa huruf atau angka !',
            'initial.max' => 'Inisial ukuran maximal 6 karakter !',
        ]);

        try {
            $data = new Size;
            $data->id = $this->generateUUID();
            $data->name = $request->name;
            $data->initial = $request->initial;
            $data->save();

            return redirect()->route('ukuran.index')->with('success', 'Data ukuran ' . $data->name . ' berhasil ditambahkan !');
        } catch (\Throwable $th) {
            return redirect()->route('ukuran.index')->with('danger', 'Maaf, terjadi kesalahan !');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'name-'.$id => 'required|regex:/^[a-zA-Z0-9 ]*$/|max:12',
            'initial-'.$id => 'required|regex:/^[a-zA-Z0-9 ]*$/|max:6',
        ], [
            'name-'.$id.'.required' => 'Nama ukuran harus diisi !',
            'name-'.$id.'.regex' => 'Nama ukuran harus berupa huruf atau angka !',
            'name-'.$id.'.max' => 'Nama ukuran maximal 12 karakter !',
            'initial-'.$id.'.required' => 'Inisial ukuran harus diisi !',
            'initial-'.$id.'.regex' => 'Inisial ukuran harus berupa huruf atau angka !',
            'initial-'.$id.'.max' => 'Inisial ukuran maximal 6 karakter !',
        ]);

        try {
            $data = Size::find($id);
            $data->name = $request['name-'.$id];
            $data->initial = $request['initial-'.$id];
            $data->save();

            return redirect()->route('ukuran.index')->with('update', 'Data ukuran ' . $data->name . ' berhasil diubah !');
        } catch (\Throwable $th) {
            return redirect()->route('ukuran.index')->with('danger', 'Maaf, terjadi kesalahan !');
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
            $data = Size::find($id);
            ProductSize::where('size_id', $id)->delete();
            Size::destroy($id);
            
            return redirect()->route('ukuran.index')->with('danger', 'Data ukuran '.$data->name.' telah dihapus !');
        } catch (\Throwable $th) {
            return redirect()->route('ukuran.index')->with('danger', 'Maaf, terjadi kesalahan !');
        }
    }
}
