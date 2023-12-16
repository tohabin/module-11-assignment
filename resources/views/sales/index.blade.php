@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Sales History</h2>
    <a href="{{ route('sales.create') }}" class="btn btn-success mb-4">Record Sale</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->product->name }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>${{ $sale->amount }}</td>
                <td>{{ $sale->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection