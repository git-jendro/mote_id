<?php

namespace App\Http\Controllers;

use App\Barcode;
use App\Color;
use App\Product;
use App\ProductColor;
use App\ProductImage;
use App\ProductSize;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();

        return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color = Color::all();
        $size = Size::all();
        return view('products.create', compact('color', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['price'] = (int) str_replace(',', '', $request->price);
        $request['l_qty'] = (string)$request->qty;
        $request['l_price'] = (string)$request->price;
        $request->validate([
            'name' => 'required|min:6|max:150',
            'l_qty' => 'max:5',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'l_price' => 'min:5|max:11',
            'desc' => 'required|max:1000',
            'path' => 'required',
            'path.*' => 'image|max:2000',
            'thumbnail' => 'required|numeric',
            'color_id' => 'required|array',
            'size_id' => 'required|array',
            'color_id.*' => 'exists:colors,id',
            'size_id.*' => 'exists:sizes,id',
        ], [
            'name.required' => 'Nama produk harus diisi !',
            'name.min:6' => 'Nama produk minimal 6 karakter !',
            'name.max:150' => 'Nama produk maximal 150 karakter !',
            'qty.required' => 'Jumlah stock harus diisi !',
            'qty.numeric' => 'Jumlah stock harus berupa angka !',
            'l_qty.max' => 'Jumlah stock maximal 5 dijit !',
            'price.required' => 'Harga produk harus diisi !',
            'price.numeric' => 'Harga produk harus berupa angka !',
            'l_price.min' => 'Harga produk terlalu sedikit !',
            'l_price.max' => 'Harga produk terlalu berlebihan !',
            'desc.required' => 'Deskripsi produk harus diisi !',
            'desc.max:1000' => 'Deskripsi produk terlalu panjang !',
            'path.required' => 'Harus melampirkan gambar produk !',
            'path.*.image' => 'Format yang diizinkan hanya jpg, jpeg, png, bmp, gif, svg, or webp !',
            'path.*.max' => 'Ukuran gambar maximal 2 MB !',
            'thumbnail.required' => 'Silahkan pilih thumbnail produk !',
            'thumbnail.numeric' => 'Silahkan pilih thumbnail produk !',
            'color_id.required' => 'Pilih warna yang tersedia !',
            'color_id.array' => 'Maaf inputan salah !',
            'size_id.required' => 'Pilih ukuran yang tersedia !',
            'size_id.array' => 'Maaf inputan salah !',
            'color_id.*.exists' => 'Data yang dimasukan salah !',
            'size_id.*.exists' => 'Data yang dimasukan salah !',
        ]);

        try {
            $data = new Product;
            $data->id = $this->generateUUID();
            $data->name = $request->name;
            $data->qty = $request->qty;
            $data->price = $request->price;
            $data->desc = $request->desc;
            $path = 'Produk/' . $data->id;
            $data->slug = $this->slug($request->name);
            
            foreach ($request->file('path') as $key => $value) {
                $img = new ProductImage;
                $img->id = $this->generateUUID();
                $img->path = $this->storage($path, $value);
                $img->product_id = $data->id;
                if ($key == $request->thumbnail) {
                    $img->thumbnail = 1;
                } else {
                    $img->thumbnail = 0;
                }
                $img->save();
            }
    
            foreach ($request->color_id as $value) {
                $color = new ProductColor;
                $color->id = $this->generateUUID();
                $color->product_id = $data->id;
                $color->color_id = $value;
                $color->save();
            }
    
            foreach ($request->size_id as $value) {
                $size = new ProductSize;
                $size->id = $this->generateUUID();
                $size->product_id = $data->id;
                $size->size_id = $value;
                $size->save();
            }
            $data->save();

            return redirect()->route('produk.index')->with('success', 'Data produk ' . $data->name . ' berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('produk.index')->with('danger', 'Maaf, terjadi kesalahan !');
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
            $data = Product::find($id);

            return view('products.show', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->route('produk.index')->with('danger', 'Data tidak ditemukan !');
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
            $data = Product::find($id);
            $color = Color::all();
            $size = Size::all();

            return view('products.edit', compact('data', 'color', 'size'));
        } catch (\Throwable $th) {
            return redirect()->route('produk.index')->with('danger', 'Data tidak ditemukan !');
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
        $request['price'] = (int) str_replace(',', '', $request->price);
        $request['l_qty'] = (string)$request->qty;
        $request['l_price'] = (string)$request->price;
        $request->validate([
            'name' => 'required|min:6|max:150',
            'l_qty' => 'max:5',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'l_price' => 'min:5|max:11',
            'desc' => 'required|max:1000',
            'color_id' => 'required|array',
            'size_id' => 'required|array',
            'color_id.*' => 'exists:colors,id',
            'size_id.*' => 'exists:sizes,id',
        ], [
            'name.required' => 'Nama produk harus diisi !',
            'name.min:6' => 'Nama produk minimal 6 karakter !',
            'name.max:150' => 'Nama produk maximal 150 karakter !',
            'qty.required' => 'Jumlah stock harus diisi !',
            'qty.numeric' => 'Jumlah stock harus berupa angka !',
            'l_qty.max' => 'Jumlah stock maximal 5 dijit !',
            'price.required' => 'Harga produk harus diisi !',
            'price.numeric' => 'Harga produk harus berupa angka !',
            'l_price.min' => 'Harga produk terlalu sedikit !',
            'l_price.max' => 'Harga produk terlalu berlebihan !',
            'desc.required' => 'Deskripsi produk harus diisi !',
            'desc.max:1000' => 'Deskripsi produk terlalu panjang !',
            'color_id.required' => 'Pilih warna yang tersedia !',
            'color_id.array' => 'Maaf inputan salah !',
            'size_id.required' => 'Pilih ukuran yang tersedia !',
            'size_id.array' => 'Maaf inputan salah !',
            'color_id.*.exists' => 'Data yang dimasukan salah !',
            'size_id.*.exists' => 'Data yang dimasukan salah !',
        ]);
        $data = Product::find($id);

        if ($data->image->count() < 1) {
            $request->validate([
                'path' => 'required',
                'path.*' => 'image|max:2000',
            ], [
                'path.required' => 'Harus melampirkan gambar produk !',
                'path.*.image' => 'Format yang diizinkan hanya jpg, jpeg, png, bmp, gif, svg, or webp !',
                'path.*.max' => 'Ukuran gambar maximal 2 MB !',
            ]);
        }

        $conn = $data->image->where('thumbnail', 1)->count();
        if ($conn < 1) {
            $request->validate([
                'thumbnail' => 'required|numeric',
            ], [
                'thumbnail.required' => 'Silahkan pilih thumbnail produk !',
                'thumbnail.numeric' => 'Silahkan pilih thumbnail produk !',
            ]);
        }

        $data->name = $request->name;
        $data->qty = $request->qty;
        $data->price = $request->price;
        $data->desc = $request->desc;
        $data->slug = $this->slug($request->name);
        $path = 'Produk/' . $data->id;
        if ($request->has('path')) {
            foreach ($request->file('path') as $key => $value) {
                $img = new ProductImage;
                $img->id = $this->generateUUID();
                $img->path = $this->storage($path, $value);
                $img->product_id = $data->id;
                $img->thumbnail = 0;
                if ($key == $request->thumbnail) {
                    ProductImage::where('product_id', $data->id)->update(
                        ['thumbnail' => 0]
                    );
                    $img->thumbnail = 1;
                }
                $img->save();
            }
        }

        ProductColor::where('product_id', $data->id)->delete();
        foreach ($request->color_id as $value) {
            $color = new ProductColor;
            $color->id = $this->generateUUID();
            $color->product_id = $data->id;
            $color->color_id = $value;
            $color->save();
        }

        ProductSize::where('product_id', $data->id)->delete();
        foreach ($request->size_id as $value) {
            $size = new ProductSize;
            $size->id = $this->generateUUID();
            $size->product_id = $data->id;
            $size->size_id = $value;
            $size->save();
        }
        $data->save();

        return redirect()->route('produk.index')->with('update', 'Data produk ' . $data->name . ' berhasil diubah');
        try {
        } catch (\Throwable $th) {
            return redirect()->route('produk.index')->with('danger', 'Maaf, terjadi kesalahan !');
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
            $data = Product::find($id);
            ProductImage::where('product_id', $id)->delete();
            Storage::delete($data->path);   
            Product::destroy($id);

            return redirect()->route('produk.index')->with('danger', 'Data produk ' . $data->name . ' telah dihapus !');
        } catch (\Throwable $th) {

            return redirect()->route('produk.index')->with('danger', 'Data tidak ditemukan !');
        }
    }

    public function delete_image(Request $request)
    {
        $data = ProductImage::find($request->id);

        if ($data) {
            $all = ProductImage::where('product_id', $data->product_id)->count();
            if ($all > 1) {
                if (Storage::exists($data->path)) {
                    ProductImage::destroy($request->id);
                    Storage::delete($data->path);
                } else {
                    dd('File not found.');
                }
                return response()->json(200);
            } else {
                return response()->json(500);
            }
        } else {
            return response()->json(500);
        }
    }
}
