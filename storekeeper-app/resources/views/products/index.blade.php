<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Product List</h2>
        <a href="{{ route('products.create') }}" class="btn btn-success mb-4">Create Product</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
