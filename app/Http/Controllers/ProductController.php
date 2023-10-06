<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Product::create($request->all())){
            return response()->json([
                'message' => 'Product created successfully!'
            ], 201);
        }
        return response()->json([
            'error' => 'Unable to created product, check the informations.'
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product)
    {
        $prod = Product::find($product);
        if( $prod){
            return  $prod;
        }
        return response()->json([
            'error' => 'Product not found'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
        $prod = Product::find($product);
        if($prod){
            $prod->update($request->all());
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
    public function destroy(string $product)
    {
        if(Product::destroy($product)){
            return response()->json([
                'message' => 'Product deleted successfully.'
            ], 200);
        }
        return response()->json([
            'error' => 'Unable to delete the product entered, please try again.'
        ], 404);
    }
}
