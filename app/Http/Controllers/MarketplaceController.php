<?php

namespace App\Http\Controllers;

use App\Models\Marketplace;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marketplace::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Marketplace::create($request->all())){
            return response()->json([
                'message' => 'Market registered successfully!'
            ], 201);
        }
        else{
            return response()->json([
                'error' => 'Unable to register market, check the informations.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $marketplace)
    {
        $market = Marketplace::find($marketplace);
        if($market){
            return $market;
        }
        return response()->json([
            'error' => 'Market not found.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $marketplace)
    {
        $market = Marketplace::find($marketplace);
        if($market){
            $market->update($request->all());
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
    public function destroy(string $marketplace)
    {
        if(Marketplace::destroy($marketplace)){
            return response()->json([
                'message' => 'Market deleted successfully.'
            ], 200);
        }
        return response()->json([
            'error' => 'Unable to delete the market entered, please try again.'
        ], 404);

    }
}
