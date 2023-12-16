@extends('layouts.app')

@section('content')
<h2 class="mb-4">Create Product</h2>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="form-group col-md-12 row">
        <label class="col-md-2" for="name">Product Name</label>
        <input type="text" class="form-control col-md-5" id="name" name="name" required>
    </div>
    <div class="form-group col-md-12 row">
        <label class="col-md-2" for="quantity">Quantity</label>
        <input type="number" class="form-control col-md-5" id="quantity" name="quantity" required>
    </div>
    <div class="form-group col-md-12 row">
        <label class="col-md-2" for="price">Price</label>
        <input type="text" class="form-control col-md-5" id="price" name="price" required>
    </div>
    <div class="col-lg-7 text-md-center">
        <button type="submit" class="btn btn-primary col-md-5">Submit</button>
    </div>

</form>
@endsection