<!-- resources/views/sales/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Record Sale</h2>
        <form method="POST" action="{{ route('sales.store') }}" id="saleForm">
            @csrf
            <div class="form-group row col-md-12">
                <label for="product_id" class="col-md-2">Select Product</label>
                <select class="form-control col-md-5" id="product_id" name="product_id" required>
                    <option value="">--Select a Product--</option>    
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12 row">
                <label for="quantity" class="col-md-2">Quantity</label>
                <input type="number" class="form-control col-md-5" id="quantity" name="quantity" required>
            </div>
            <div class="form-group col-md-12 row">
                <label for="price" class="col-md-2">Price</label>
                <input type="text" class="form-control col-md-5" id="price" name="price" readonly>
            </div>
            <div class="form-group col-md-12 row">
                <label for="amount" class="col-md-2">Amount</label>
                <input type="text" class="form-control col-md-5" id="amount" name="amount" readonly>
            </div>
            <div class="form-group col-md-12 row">
                <label for="date" class="col-md-2">Sale Date</label>
                <input type="date" class="form-control col-md-5" id="date" name="date" required>
            </div>
            <div class="col-lg-7 text-md-center">
                <button type="submit" class="btn btn-primary col-md-5">Submit</button>
            </div>
        
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // AJAX call to get product price on product change
            $('#product_id').change(function() {
                var productId = $(this).val();
                $.ajax({
                    url: "{{ route('sales.getProductPrice') }}",
                    method: 'GET',
                    data: { product_id: productId },
                    success: function(response) {
                        $('#price').val(response.price);
                        calculateAmount();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // Calculate amount on quantity change
            $('#quantity').on('input', function() {
                calculateAmount();
            });

            // Function to calculate the amount
            function calculateAmount() {
                var quantity = parseFloat($('#quantity').val()) || 0;
                var price = parseFloat($('#price').val()) || 0;
                var amount = quantity * price;
                $('#amount').val(amount.toFixed(2));
            }
        });
    </script>
@endsection
