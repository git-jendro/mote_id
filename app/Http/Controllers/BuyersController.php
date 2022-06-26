<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class BuyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buyer::all();

        return view('buyers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();

        return view('buyers.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request['l_phone_num'] = (string)$request->phone_num;
            $request->validate([
                'name' => 'required|min:3|max:150',
                'phone_num' => 'required|regex:/^[0-9]*$/',
                'l_phone_num' => 'min:11|max:13',
                'address' => 'required|max:1000',
                'product_id' => 'required|exists:products,id',
            ], [
                'name.required' => 'Nama pembeli harus diisi !',
                'name.min' => 'Nama pembeli minimal 3 karakter !',
                'name.max' => 'Nama pembeli maximal 150 karakter !',
                'phone_num.required' => 'Nomor telepon harus diisi !',
                'phone_num.regex' => 'Nomor telepon harus berupa angka !',
                'l_phone_num.min' => 'Nomor telepon minimal 11 digit !',
                'l_phone_num.max' => 'Nomor telepon maximal 13 digit !',
                'address.required' => 'Alamat pembeli harus diisi !',
                'address.max' => 'Alamat pemebeli maximal 1000 karakter',
                'product_id.required' => 'Produk harus dipilih !',
                'product_id.exists' => 'Produk salah !',
            ]);

            $data = new Buyer;
            $data->id = $this->generateUUID();
            $data->name = $request->name;
            $data->phone_num = ltrim($request->phone_num, '0');
            $data->address = $request->address;
            $data->product_id = $request->product_id;
            $data->save();
            $product = Product::find($request->product_id);
            $total = $product->qty - 1;
            $product->qty = $total;
            $product->save();

            return redirect()->route('pembeli.index')->with('success', 'Data pembeli ' . $data->name . ' berhasil ditambahkan !');
        } catch (\Throwable $th) {
            return redirect()->route('pembeli.index')->with('danger', 'Maaf terjadi masalah !');
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
        try {
            $data = Buyer::find($id);

            return view('buyers.show', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->route('pembeli.index')->with('danger', 'Data tidak ditemukan !');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = Buyer::find($id);

            $product = Product::all();

            return view('buyers.edit', compact('data', 'product'));
        } catch (\Throwable $th) {
            return redirect()->route('pembeli.index')->with('danger', 'Data tidak ditemukan !');
        }
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
        try {
            $request['l_phone_num'] = (string)$request->phone_num;
            $request->validate([
                'name' => 'required|min:3|max:150',
                'phone_num' => 'required|regex:/^[0-9]*$/',
                'l_phone_num' => 'min:11|max:13',
                'address' => 'required|max:1000',
                'product_id' => 'required|exists:products,id',
            ], [
                'name.required' => 'Nama pembeli harus diisi !',
                'name.min' => 'Nama pembeli minimal 3 karakter !',
                'name.max' => 'Nama pembeli maximal 150 karakter !',
                'phone_num.required' => 'Nomor telepon harus diisi !',
                'phone_num.regex' => 'Nomor telepon harus berupa angka !',
                'l_phone_num.min' => 'Nomor telepon minimal 11 digit !',
                'l_phone_num.max' => 'Nomor telepon maximal 13 digit !',
                'address.required' => 'Alamat pembeli harus diisi !',
                'address.max' => 'Alamat pemebeli maximal 1000 karakter',
                'product_id.required' => 'Produk harus dipilih !',
                'product_id.exists' => 'Produk salah !',
            ]);

            $data = Buyer::find($id);
            $productOld = Product::find($data->product_id);
            $totalOld = $productOld->qty + 1;
            $productOld->qty = $totalOld;
            $productOld->save();
            $data->name = $request->name;
            $data->phone_num = ltrim($request->phone_num, '0');
            $data->address = $request->address;
            $data->product_id = $request->product_id;
            $data->save();
            $product = Product::find($request->product_id);
            $total = $product->qty - 1;
            $product->qty = $total;
            $product->save();

            return redirect()->route('pembeli.index')->with('update', 'Data pembeli ' . $data->name . ' berhasil diubah !');
        } catch (\Throwable $th) {
            return redirect()->route('pembeli.index')->with('danger', 'Maaf terjadi masalah !');
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
            $data = Buyer::find($id);
            $product = Product::find($data->product_id);
            $total = $product->qty + 1;
            $product->qty = $total;
            $product->save();
            Buyer::destroy($id);

            return redirect()->route('pembeli.index')->with('danger', 'Data pembeli ' . $data->name . ' berhasil dihapus !');
        } catch (\Throwable $th) {
            return redirect()->route('pembeli.index')->with('danger', 'Maaf terjadi masalah !');
        }
    }
}
