<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\TransactionRequest;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
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
        return view('transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('transaction.create', compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        //
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Transaction $transaction)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Transaction $transaction)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateTransactionRequest $request, Transaction $transaction)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Transaction $transaction)
    // {
    //     //
    // }
}
