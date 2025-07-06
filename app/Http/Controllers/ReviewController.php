<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Transaction $transaction)
    {
        return view('review', [
            'transaction' => $transaction,
            'products' => Product::where('id', $transaction->product_id)->get(),
            'categories' => Category::get()
        ]);
    }

    public function store(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'transaction_id' => 'required',
            'product_id' => 'required',
            'ulasan' => 'nullable',
            'bintang' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('review-products', 'public');
        }

        Review::create($validatedData);

        Transaction::where('id', $transaction->id)->update(['status' => 'rate it']);

        return redirect('/purchases')->with('success', 'Successfully reviewed the product');
    }
}
