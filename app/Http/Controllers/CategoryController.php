<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Category::create($request->all())){
            return response()->json([
                'message' => 'Category created successfully!'
            ], 201);
        }
        return response()->json([
            'error' => 'Unable to created category, check the informations.'
        ], 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        $categ = Category::find($category);
        if($categ){
            return $categ;
        }
        return response()->json([
            'error' => 'Category not found'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $category)
    {
        $categ = Category::find($category);
        if($categ){
            $categ->update($request->all());
            return response()->json([
                'message' => 'Informations updated successfully.'
            ], 200);
        }
        return response()->json([
            'error' => 'Unable to update information, please try again.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        if(Category::destroy($category)){
            return response()->json([
                'message' => 'Category deleted successfully.'
            ], 200);
        }
        return response()->json([
            'error' => 'Unable to delete the category entered, please try again.'
        ], 404);
    }
}
