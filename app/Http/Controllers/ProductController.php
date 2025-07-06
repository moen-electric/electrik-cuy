<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::latest()->get(),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        $carts = Auth::check()
            ? Cart::with('product')->where('user_id', Auth::id())->get()
            : collect();

        $reviews = Review::where('product_id', $product->id)
            ->with('user')
            ->latest()
            ->get();

        $recomendeds = Product::where('brand_id', $product->brand_id)
        ->where('id', '!=', $product->id)
        ->latest()
        ->get();

        return view('productdetail2', compact('product', 'carts', 'reviews', 'recomendeds'), [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image1' => 'required|max:1024',
            'image2' => 'required|max:1024',
            'image3' => 'required|max:1024',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required'
        ]);

        if($request->file('image1')) {
            $validateData['image1'] = $request->file('image1')->store('product-images', 'public');
        }

        if($request->file('image2')) {
            $validateData['image2'] = $request->file('image2')->store('product-images', 'public');
        }

        if($request->file('image3')) {
            $validateData['image3'] = $request->file('image3')->store('product-images', 'public');
        }
        // return $validateData;

        Product::create($validateData);

        return redirect('/product')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.view', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image1' => 'max:1024',
            'image2' => 'max:1024',
            'image3' => 'max:1024',
            'deskripsi' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image1')) {
            if($request->oldImage1) {
                Storage::disk('public')->delete($request->oldImage1);
            }

            $validatedData['image1'] = $request->file('image1')->store('product-images', 'public');
        }

        if($request->file('image2')) {
            if($request->oldImage2) {
                Storage::disk('public')->delete($request->oldImage2);
            }

            $validateData['image2'] = $request->file('image2')->store('product-images', 'public');
        }

        if($request->file('image3')) {
            if($request->oldImage3) {
                Storage::disk('public')->delete($request->oldImage3);
            }

            $validatedData['image3'] = $request->file('image3')->store('product-images', 'public');
        }

        Product::where('id', $product->id)->update($validatedData);
        return redirect('/product')->with('success', 'Products has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image1) {
            Storage::disk('public')->delete($product->image1);
        }

        if($product->image2) {
            Storage::disk('public')->delete($product->image2);
        }

        if($product->image3) {
            Storage::disk('public')->delete($product->image3);
        }

        Product::destroy($product->id);
        return redirect('/product')->with('success', 'Product has been deleted!');
    }


}
