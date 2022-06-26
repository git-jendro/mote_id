<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Color;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        $product = Product::count();
        $buyer = Buyer::count();
        $color = Color::count();
        $size = Size::count();
        $data = Buyer::all();
        return view('dashboard', compact('product', 'buyer', 'color', 'size', 'data'));
    }

    public function area_chart()
    {
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $buyer = Buyer::whereMonth('created_at', '=', $i)->count();
            $data[] = $buyer;
        }
        return response()->json($data);
    }

    public function pie_chart()
    {
        $product = Product::all();
        $data = Product::withCount('buyer')->get();
        $data_product = [];
        $data_count = [];
        foreach ($product as $value) {
            $data_product[] = $value->name;
        }
        foreach ($data as $value) {
            $data_count[] = $value->buyer_count;
        }
        return response()->json([
            'product' => $data_product,
            'count' => $data_count
        ]);
    }

    public function index()
    {
        return view('index');
    }

    public function show_product($param)
    {
        try {
            $data = Product::where('slug', $param)->firstOrFail();
            
            return view('show-product', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->route('index');
        }
    }
}
