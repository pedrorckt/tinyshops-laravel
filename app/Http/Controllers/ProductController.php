<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('orderby')) {
            $validated = Validator::make($request->all(), [
                'orderby' => 'in:name,price',
                'order' => 'in:asc,desc'
            ]);
            if ($validated->fails()) {
                return response()->json($validated->errors(), 422);
            }
            $products = Product::with(['categories'])->orderBy($request->input('orderby'), $request->input('order'))->paginate(8);
        } else {
            $products = Product::with(['categories'])->orderBy('is_pinned', 'desc')->paginate(8);
        }
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

    public function me() {
        $user = auth()->user();
        $products = Product::where('shop_id', $user->shop_id)->paginate(8);
        $user->products = $products;
        return $user;
    }
}
