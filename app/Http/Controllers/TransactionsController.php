<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Reviews;
use App\Models\Products;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index(Carts $cart, Request $request)
    {
        $product= Products::where('id', $cart->product)->get();

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
                'name' => $product->name
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

        return view('user.transaction.index', [
            'harga' => $harga,
            'product' => $product,
            'jumlahBeli' => $jumlahBeli,
            'snapToken' => $snapToken,
            'cart' => $cart
        ]);
    }

    public function store(Carts $cart, Request $request)
    {
        // $validatedData2['stok'] =$cart->shoes->stok - $cart->jumlah;
        // return $validatedData2;
        $json= json_decode($request->get('json'));
        // return $json;

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['product_id'] = $cart->product_id;
        $validatedData['status'] = $json->transaction_status;
        $validatedData['order_id'] = $json->order_id;
        $validatedData['gross_amount'] = $json->gross_amount;
        $validatedData['pdf_url'] = $json->pdf_url ?? null;
        // return $validatedData;

        Transactions::create($validatedData);

        $validatedData2['stok'] =$cart->product->stok - $cart->jumlah;

        Products::where('id', $cart->product->id)->update($validatedData2);

        $cart->delete();

        return redirect('/purchases')->with('success', 'Your order has been created');
    }

    public function review(Transactions $transaction)
    {
        // return $transaction;
        return view('user.purchases.review', [
            'transaction' => $transaction,
            'product' => Products::where('id', $transaction->product_id)->get()
        ]);
    }

    public function reviewpost(Request $request, Transactions $transaction)
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
        Reviews::create($validatedData);

        $validatedData2['status'] = 'rate it';

        Transactions::where('id', $transaction->id)->update($validatedData2);

        return redirect('/purchases')->with('success', 'Successfully reviewed the product');

    }
}
