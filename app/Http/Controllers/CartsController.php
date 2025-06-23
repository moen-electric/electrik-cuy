<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function cart(Request $request)
    {
        // return $request;
        $validatedData= $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'harga' => 'required',
            'jumlah' => 'required|min:1'
        ]);

        $validatedData['harga'] = $request->harga * $request->jumlah;

        Carts::create($validatedData);

        return redirect('/sale')->with('success', 'Berhasil ditambahkan di keranjang');
    }

    public function deleteCart(Carts $cart)
    {
        // return $cart->cart_id;
        Carts::destroy($cart->id);
        return redirect('/sale')->with('success', 'Keranjang berhasil dihapus');
    }
}
