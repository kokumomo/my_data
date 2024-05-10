<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        // dd($stocks, $products);
        $products = Product::all();

        return view('user.index', compact('products'));
    }
}
