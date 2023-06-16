<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::paginate(10);
        return $shops;
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        $products = $shop->products()->paginate(8);
        $shop->products = $products;
        return $shop;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->update($request->all());
    }
}
