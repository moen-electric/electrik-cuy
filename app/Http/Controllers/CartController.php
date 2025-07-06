<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Tampilkan halaman keranjang
    public function index()
    {
        $carts = Cart::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        return view('cart', compact('carts'));
    }

    // Tambah ke keranjang
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $product->id)
                            ->first();

        if ($existingCart) {
            $existingCart->jumlah += $validatedData['jumlah'];
            $existingCart->harga = $product->harga * $existingCart->jumlah;
            $existingCart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'jumlah' => $validatedData['jumlah'],
                'harga' => $product->harga * $validatedData['jumlah'],
            ]);
        }

        // Kembalikan dengan flash session untuk modal
        return redirect()->back()->with([
            'cart_added' => true,
            'product' => $product
        ]);
    }

    // Hapus item dari keranjang
    public function destroy(Cart $cart)
    {
        if ($cart->user_id == Auth::id()) {
            $cart->delete();
            return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
        }

        abort(403); // Forbidden
    }
}
