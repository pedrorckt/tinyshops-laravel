<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
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
        $products = Product::with(['categories'])->paginate(8);
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $user = $request->user();
        $request->merge(['shop_id' => $user->shop_id]);
        $slug = str_replace(' ', '-', strtolower($request->name));
        $request->merge(['slug' => $slug]);
        $product = Product::create($request->all());
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product->load(['categories','images']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $user = auth()->user();
        if ($user->shop_id !== $product->shop_id) {
            abort(403, 'Unauthorized action.');
        }
        $product->delete();
    }
}
