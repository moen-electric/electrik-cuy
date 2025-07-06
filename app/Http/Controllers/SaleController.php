<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Review;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $user = Auth::check()
        ? Cart::with('product')->where('user_id', Auth::id())->latest()->get()
        : collect();

        return view('sale', [
            'products' => Product::with('category')->latest()->filter(request(['search', 'category']))->get(),
            'categories' => Category::all(),
            // 'user' => $user,
            'carts' => Auth::check() ? Cart::with('product')->where('user_id', Auth::id())->get() : collect(),
        ]);
    }

    public function detail(Product $product)
    {
        $recomendeds = Product::where('harga', '>=', $product->harga - 50000)
            ->where('harga', '<=', $product->harga + 50000)
            ->where('id', '!=', $product->id)
            ->latest()
            ->get();

        $reviews = Review::where('product_id', $product->id)
            ->with('user')
            ->latest()
            ->get();

        return view('sale', [
            'product' => $product,
            'recomendeds' => Product::where('id', '!=', $product->id)->where('category_id', '=', $product->category_id)->latest()->get(),
            'reviews' => Review::where('product_id', $product->id)->get(),
            'categories' => Category::get()
        ]);
    }
}

