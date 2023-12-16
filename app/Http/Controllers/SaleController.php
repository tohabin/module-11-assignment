<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function getProductPrice(Request $request)
    {
        $productId = $request->input('product_id');
        $productPrice = DB::table('products')->where('id', $productId)->value('price');
        
        return response()->json(['price' => $productPrice]);
    }
    
    // ...
    
    public function store(Request $request)
    {
    
    
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);
    
    
        // Calculate the amount based on quantity and price
        $amount = $request->input('quantity') * $request->input('price');
    
    
        Sale::create([
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'amount' => $amount,
            'date' => $request->input('date'),
        ]);
    
        // Subtract quantity from the product table
        Product::where('id', $request->input('product_id'))->decrement('quantity', $request->input('quantity'));
    
        return redirect()->route('sales.index');
    }
    
}

