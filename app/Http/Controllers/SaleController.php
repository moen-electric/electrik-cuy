<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Categories;
use App\Models\Reviews;
use App\Models\Products;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Carts::where('user_id', Auth::user()->id)->latest()->get();
        } else {
            $user = Carts::get();
        }


        return view('user.sale.index', [
            'product' => Products::latest()->filter(request(['search', 'category']))->get(),
            'categories' => Categories::all(),
            // 'user' => $user,
            'carts' => $user
        ]);
    }

    public function detail(Products $products)
    {
        $coba= $products->harga ;
        $recomendeds = Products::where('harga', '>', $products->harga - 50000)->where('harga', '<', $products->harga + 50000)->latest()->get();
        // return $recomendeds;
        return view('user.sale.detail', [
            'products' => $products,
            'recomendeds' => Products::where('harga', '>=', $products->harga - 50000)->where('harga', '<=', $products->harga + 50000)->where('id', '!=', $products->id)->latest()->get(),
            'reviews' => Reviews::where('id_sepatu', $products->id)->get()
        ]);
    }
}
