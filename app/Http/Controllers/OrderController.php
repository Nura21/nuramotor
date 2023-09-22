<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();

            if ($user && $user->role !== RoleEnum::PENGGUNA) {
                return abort(403);
            }

            return $next($request);
        })->only([
            'index', 
            'create', 
            'store', 
            'edit', 
            'update', 
            'delete'
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

        return view('order.index', compact("orders"));
    }

    public function create()
    {
        $products = Product::all()->where('status', StatusEnum::READY->value);

        return view('order.create', compact("products"));
    }

    public function store(OrderRequest $request)
    {
        try{
            $product = Product::findOrFail($request->product_id);
            $checkQty = $product->qty >= $request->qty;
            
            if($checkQty === true){
                Order::create([
                    'product_id' => $request->product_id,
                    'type_id' => $request->type_id,
                    'qty' => $request->qty,
                    'price' => $request->price
                ]);
            }

            if($checkQty === false){
                return to_route('orders.create');
            }

            return to_route('orders.index');
        }catch( \Exception $e){
            dd($e);
            return to_route('orders.create');
        }


    }

    public function edit(Order $order)
    {
        return view('order.edit', compact("order"));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->validate());

        return to_route('orders.index');
    }

    public function delete(Order $order)
    {
        $order->delete();

        return to_route('orders.index');
    }
}
