<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = count(Product::all());
        $transactions = count(Transaction::all());
        $users = count(User::all());

        return view('dashboard.dashboard', compact("products", "transactions", "users"));
    }
}
