<?php

namespace App\Http\Controllers;

use App\Product;
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
        
        $request['l_width'] = (string)$request->width;
        $request['l_height'] = (string)$request->height;
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9 ]*$/|max:12',
            'width' => 'required|numeric',
            'l_width' => 'max:4',
            'height' => 'required|numeric',
            'l_height' => 'max:4',
        ], [
            'name.required' => 'Nama ukuran harus diisi !',
            'name.regex' => 'Nama ukuran harus berupa huruf atau angka !',
            'name.max' => 'Nama ukuran maximal 12 karakter !',
            'width.required' => 'Lebar ukuran harus diisi !',
            'width.numeric' => 'Lebar ukuran harus berupa angka !',
            'l_width.max' => 'Lebar ukuran maximal 4 dijit !',
            'height.required' => 'Lebar ukuran harus diisi !',
            'height.numeric' => 'Lebar ukuran harus berupa angka !',
            'l_height.max' => 'Lebar ukuran maximal 4 dijit !',
        ]);

        try {
            $data = new Size;
            $data->id = $this->generateUUID();
            $data->name = $request->name;
            $data->width = $request->width;
            $data->height = $request->height;
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
            'width-'.$id => 'required|numeric',
            'l_width-'.$id => 'max:4',
            'height-'.$id => 'required|numeric',
            'l_height-'.$id => 'max:4',
        ], [
            'name-'.$id.'.required' => 'Nama ukuran harus diisi !',
            'name-'.$id.'.regex' => 'Nama ukuran harus berupa huruf atau angka !',
            'name-'.$id.'.max' => 'Nama ukuran maximal 12 karakter !',
            'width-'.$id.'.required' => 'Lebar ukuran harus diisi !',
            'width-'.$id.'.numeric' => 'Lebar ukuran harus berupa angka !',
            'l_width-'.$id.'.max' => 'Lebar ukuran maximal 4 dijit !',
            'height-'.$id.'.required' => 'Lebar ukuran harus diisi !',
            'height-'.$id.'.numeric' => 'Lebar ukuran harus berupa angka !',
            'l_height-'.$id.'.max' => 'Lebar ukuran maximal 4 dijit !',
        ]);

        try {
            $data = Size::find($id);
            $data->name = $request['name-'.$id];
            $data->width = $request['width-'.$id];
            $data->height = $request['height-'.$id];
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
            $data = Size::findOrFail($id);
            Product::where('size_id', $id)
            ->update([
                'size_id' => null,
            ]);
            Size::destroy($id);
            
            return redirect()->route('ukuran.index')->with('danger', 'Data ukuran '.$data->name.' telah dihapus !');
        } catch (\Throwable $th) {
            return redirect()->route('ukuran.index')->with('danger', 'Maaf, terjadi kesalahan !');
        }
    }
}
