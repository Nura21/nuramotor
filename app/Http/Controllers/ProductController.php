<?php

namespace App\Http\Controllers;

use App\Enums\ColorEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();

            if ($user && $user->role !== RoleEnum::ADMIN) {
                return abort(403);
            }

            return $next($request);
        })->only(['index', 'create', 'store', 'edit', 'update', 'delete']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all()->where('status', StatusEnum::READY->value);

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
            if($request?->hasFile('image')){
                $fileNameWithExt = $request?->file('image')?->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request?->file('image')?->getClientOriginalExtension();
                $fileNameSave = $fileName.'_'.time().'.'.$extension;
                $path = $request?->file('image')?->storeAs('public/img', $fileNameSave);
            }

            $product = Product::create([
                'name' => $request->name,
                'image' => $fileNameSave,
                'description' => $request->description,
                'price' => $request->price,
                'status' => $request->status,
                'qty' => $request->qty,
            ]);

            Type::create([
                'product_id' => $product->id,
                'name' => $request->type,
                'color' => $request->color
            ]);
            
            return to_route('products.index');
        } catch (\Exception $e) {
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
        $status = StatusEnum::toArray();
        $colors = ColorEnum::toArray();

        return view('product.edit', compact("product", "status", "colors"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        try{
            if($request?->hasFile('image')){
                Storage::disk('public')->delete('public/img/' . $product->image);
                $fileNameWithExt = $request?->file('image')?->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request?->file('image')?->getClientOriginalExtension();
                $fileNameSave = $fileName.'_'.time().'.'.$extension;
                $path = $request?->file('image')?->storeAs('public/img', $fileNameSave);
            }


            $product->update([
                'name' => $request->name,
                'image' => isset($fileNameSave) ? $fileNameSave : $product->image,
                'description' => $request->description,
                'price' => $request->price,
                'status' => $request->status,
                'qty' => $request->qty,
            ]);

            $product->type()->update([
                'product_id' => $product->id,
                'name' => $request->type,
                'color' => $request->color
            ]);

            return to_route('products.index');
        }catch( \Exception $e){
            return to_route('products.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete('public/img/' . $product->image);

        $product->delete();

        return to_route('products.index');
    }
}
