<?php

namespace App\Http\Controllers;

use App\Models\MarketStock;
use Illuminate\Http\Request;

class MarketStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MarketStock::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(MarketStock::create($request->all())){
            return response()->json([
                'message' => 'Stock added successfully!'
            ], 201);
        }
        return response()->json([
            'error' => 'Unable to add stock, check the informations.'
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $stock)
    {
        $st = MarketStock::find($stock);
        if($st){
            return  $st;
        }
        return response()->json([
            'error' => 'Stock not found'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $stock)
    {
        $st = MarketStock::find($stock);
        if($st){
            $st->update($request->all());
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
    public function destroy(string $stock)
    {
        if(MarketStock::destroy($stock)){
            return response()->json([
                'message' => 'Stock deleted successfully.'
            ], 200);
        }
        return response()->json([
            'error' => 'Unable to delete the stock entered, please try again.'
        ], 404);
    }
}
