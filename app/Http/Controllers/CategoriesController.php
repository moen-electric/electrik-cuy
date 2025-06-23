<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index', [
            'active' => 'category',
            'categories' => Categories::latest()->get()
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
            'name' => 'required'
        ]);

        Categories::create($validateData);

        return redirect('/category')->with('success', 'Category added successfully!');
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
    public function edit(Categories $category)
    {
        return view('admin.category.edit', [
            'active' => 'category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $rules = [
            'name' => 'required'
        ];

        $validateData = $request->validate($rules);

        Categories::where('id', $category->id)->update($validateData);

        return redirect('/category')->with('success', 'Category has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        // return $category;
        Categories::destroy($category->id);
        return redirect('/category')->with('success', 'Category has been deleted!');
    }
}
