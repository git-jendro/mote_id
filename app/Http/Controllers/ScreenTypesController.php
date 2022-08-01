<?php

namespace App\Http\Controllers;

use App\Product;
use App\ScreenType;
use Illuminate\Http\Request;

class ScreenTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ScreenType::all();
        return view('screen-types.index', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screen-types.create');
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
            'name.required' => 'Jenis sablon harus diisi !',
            'name.min:3' => 'Jenis sablon minimal 3 karakter !',
            'name.max:50' => 'Jenis sablon maximal 50 karakter !',
        ]);
        
        try {
            $data = new ScreenType;
            $data->id = $this->generateUUID();
            $data->name = $request->name;
            $data->save();
    
            return redirect()->route('jenis-sablon.index')->with('success', 'Data jenis sablon '.$data->name.' berhasil ditambahkan !');
        } catch (\Throwable $th) {
            return redirect()->route('jenis-sablon.index')->with('danger', 'Maaf terjadi kesalahan !');
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
        return redirect()->route('jenis-sablon.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('jenis-sablon.index');
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
            'name-'.$id.'.required' => 'Jenis sablon harus diisi !',
            'name-'.$id.'.min:3' => 'Jenis sablon minimal 3 karakter !',
            'name-'.$id.'.max:50' => 'Jenis sablon maximal 50 karakter !',
        ]);
        
        try {
            $data = ScreenType::findOrFail($id);
            $data->name = $request['name-'.$id];
            $data->save();
            return redirect()->route('jenis-sablon.index')->with('update', 'Data jenis sablon '.$data->name.' berhasil diubah !');
        } catch (\Throwable $th) {
            return redirect()->route('jenis-sablon.index')->with('danger', 'Maaf terjadi kesalahan !');
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
            $data = ScreenType::findOrFail($id);
            Product::where('screen_type_id', $id)
            ->update([
                'screen_type_id' => null,
            ]);
            ScreenType::destroy($id);

            return redirect()->route('jenis-sablon.index')->with('danger', 'Data jenis sablon '.$data->name.' berhasil dihapus !');
        } catch (\Throwable $th) {
            return redirect()->route('jenis-sablon.index')->with('danger', 'Maaf terjadi kesalahan   !');
        }
    }
}
