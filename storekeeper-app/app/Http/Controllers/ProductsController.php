<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;


class ProductsController extends Controller
{
    //
    public function index()
{
    $products = Product::all();
    return view('products.index', compact('products'));
}

public function create()
{
    return view('products.create');
}

public function store(Request $request)
{
    $product = new Product();
    $product->name = $request->input('name');
    $product->quantity = $request->input('quantity');
    $product->price = $request->input('price');
    $product->save();

    return redirect()->route('products.index');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $product->name = $request->input('name');
    $product->quantity = $request->input('quantity');
    $product->price = $request->input('price');
    $product->save();

    return Redirect::route('products.index')->with('success', 'Product updated successfully');
}

}
