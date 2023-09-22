<?php

namespace App\Http\Controllers;

use App\Enums\ColorEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = StatusEnum::toArray();
        $colors = ColorEnum::toArray();

        return view('product.create', compact("status", "colors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try{
            // $product = Product::create([
            //     'name' => $request->name,
            //     'image' => $request->email,
            //     'description' => now(),
            //     'price' =>
            //     'status' => Hash::make($request->password),
            //     'qty' => $role,
            // ]);
            
            // $user->userDetail()->create([
            //     'user_id' => $user->id,
            //     'ktp' => $request->ktp,
            //     'kk' => $request->kk,
            // // ]);   
            
            // Auth::login($user);
            
            return to_route('products.index');
        } catch (\Exception $e) {
            // dd($e);
			// DB::rollBack();

            return to_route('products.create');
		}
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validate());

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index');
    }
}
