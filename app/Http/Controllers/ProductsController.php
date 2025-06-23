<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'active' => 'product',
            'categories' => Categories::all(),
            'product' => Products::latest()->get()
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
            'stok' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image1' => 'required|max:1024',
            'image2' => 'required|max:1024',
            'image3' => 'required|max:1024',
            'deskripsi' => 'required'
        ]);

        if($request->file('image1')) {
            $validateData['image1'] = $request->file('image1')->store('product-images');
        }

        if($request->file('image2')) {
            $validateData['image2'] = $request->file('image2')->store('product-images');
        }

        if($request->file('image3')) {
            $validateData['image3'] = $request->file('image3')->store('product-images');
        }
        // return $validateData;

        Products::create($validateData);

        return redirect('/product')->with('success', 'Product added successfully!');
    }

    public function view(Products $product)
    {
        // return $product;
        return view('admin.product.view', [
            'active' => 'product',
            'Products' => $product
        ]);
    }

    public function edit(Products $product)
    {
        // return $product;
        return view('admin.Products.edit', [
            'active' => 'product',
            'Products' => $product,
            'categories' => Categories::all()
        ]);
    }

    public function update(Request $request, Products $product)
    {
        // return $product;
        // return $request;

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
                Storage::delete($request->oldImage1);
            }

            $validatedData['image1'] = $request->file('image1')->store('Products-images');
        }

        if($request->file('image2')) {
            if($request->oldImage2) {
                Storage::delete($request->oldImage2);
            }

            $validateData['image2'] = $request->file('image2')->store('Products-images');
        }

        if($request->file('image3')) {
            if($request->oldImage3) {
                Storage::delete($request->oldImage3);
            }

            $validatedData['image3'] = $request->file('image3')->store('Products-images');
        }

        Products::where('id', $product->id)->update($validatedData);
        return redirect('/product')->with('success', 'Products has been edited!');
    }

    public function delete(Products $product)
    {
        // return $product;
        if($product->image1) {
            Storage::delete($product->image1);
        }

        if($product->image2) {
            Storage::delete($product->image2);
        }

        if($product->image3) {
            Storage::delete($product->image3);
        }

        Products::destroy($product->id);
        return redirect('/product')->with('success', 'Product has been deleted!');
    }
}
