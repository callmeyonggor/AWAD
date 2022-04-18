@extends('layouts.app')

@section('content')

<body>
    <form method="POST" action="/product/submit_order">
        @if ($errors->any())
        <div id="errormessage" class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
            @endforeach
        </div>
        @endif
        @csrf
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="mb-4">
                            <label for="company">Company Name</label>
                            <input type="text" class="form-control" name="company" value="{{@$post->company}}" placeholder="Enter company name" required>
                        </div>
                        <div class="mb-4">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="{{@$post->address}}" placeholder="Enter address" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" name="phone" value="{{@$post->phone}}" placeholder="Enter phone" required>
                        </div>
                        @if(@$id)
                        @foreach($id as $id)
                        <input type="hidden" name="id[]" value="{{ $id }}">
                        @endforeach
                        @endif
                        @if(@$quantity)
                        @foreach($quantity as $quantity)
                        <input type="hidden" name="quantity[]" value="{{ $quantity }}">
                        @endforeach
                        @endif
                        @if(@$size)
                        @foreach($size as $size)
                        <input type="hidden" name="size[]" value="{{ $size }}">
                        @endforeach
                        @endif
                        @if(@$unit_price)
                        @foreach($unit_price as $unit_price)
                        <input type="hidden" name="unit_price[]" value="{{ $unit_price }}">
                        @endforeach
                        @endif
                        @if(@$subtotal)
                        @foreach($subtotal as $subtotal)
                        <input type="hidden" name="subtotal[]" value="{{ $subtotal }}">
                        @endforeach
                        @endif
                        @if(@$total)
                        <input type="hidden" name="total" value="{{ $total }}">
                        @endif
                        <div>
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Make Payment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script>
    $("document").ready(function() {
        setTimeout(function() {
            $('#errormessage').fadeOut('fast');
        }, 1000);
    });
</script>
@endsection