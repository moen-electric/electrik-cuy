<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index', [
            'brands' => Brand::latest()->get()
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
        $validateData= $request->validate([
            'name' => 'required'
        ]);

        Brand::create($validateData);

        return redirect('/brand')->with('success', 'Brand added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $rules= [
            'name' => 'required'
        ];

        $validateData= $request->validate($rules);
        Brand::where('id', $brand->id)->update($validateData);

        return redirect('/brand')->with('success', 'Brand has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::destroy($brand->id);
        return redirect('/brand')->with('success', 'Brand has been deleted!');
    }
}
