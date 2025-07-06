<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Cart $cart, Request $request)
    {
        $product= Product::where('id', $cart->product_id)->get();

        $jumlahBeli = $request->jumlah;

        foreach($product as $product) {
            $harga = $product->harga * $jumlahBeli;
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $harga,
            ),
            'item-details' => array(
                'id' => $cart->id,
                'price' => $product->harga,
                'quantity' => $jumlahBeli,
                'name' => $product->nama_sepatu
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                // 'last_name' => 'pratama',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->no_hp,
            ),
        );
        // return $params;

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // return $snapToken;;

        return view('transaction', [
            'harga' => $harga,
            'product' => $product,
            'jumlahBeli' => $jumlahBeli,
            'snapToken' => $snapToken,
            'cart' => $cart,
            'categories' => Category::get()
        ]);
    }

    public function store(Cart $cart, Request $request)
    {
        // $validatedData2['stok'] =$cart->product->stok - $cart->jumlah;
        // return $validatedData2;
        $json= json_decode($request->get('json'));
        // return $json;

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['product_id'] = $cart->product_id;
        $validatedData['status'] = $json->transaction_status;
        $validatedData['order_id'] = $json->order_id;
        $validatedData['gross_amount'] = $json->gross_amount;
        $validatedData['pdf_url'] = $json->pdf_url ?? null;
        // return $validatedData;

        Transaction::create($validatedData);

        $validatedData2['stok'] =$cart->product->stok - $cart->jumlah;

        Product::where('id', $cart->product->id)->update($validatedData2);

        $cart->delete();

        return redirect('/purchases')->with('success', 'Your order has been created');
    }

    public function review(Transaction $transaction)
    {
        // return $transaction;
        return view('user.purchases.review', [
            'transaction' => $transaction,
            'product' => Product::where('id', $transaction->product_id)->get()
        ]);
    }

    public function reviewpost(Request $request, Transaction $transaction)
    {
        // return $request;
        $validatedData = $request->validate([
            'user_id' => 'required',
            'transaction_id' => 'required',
            'product_id' => 'required',
            'ulasan' => 'nullable',
            'bintang' => 'required',
            'image' => 'nullable'
        ]);

        $validatedData['ulasan'] = $request->ulasan;
        $validatedData['bintang'] = $request->bintang;

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('review-products');
        }

        // return $validatedData;
        Review::create($validatedData);

        $validatedData2['status'] = 'rate it';

        Transaction::where('id', $transaction->id)->update($validatedData2);

        return redirect('/purchases')->with('success', 'Successfully reviewed the product');

    }
}
