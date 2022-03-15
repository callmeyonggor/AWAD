<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Order
            </h2>
        </x-slot>

        @if(Session::has('success_msg'))
        <div id="successMessage" class="alert alert-success">
            {!!Session::get('success_msg')!!}
        </div>
        @endif
        <form method="POST" action="/product/submit_order">
            @csrf
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product ID</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Remaining Quantity</th>
                                            <th scope="col">Unit Price</th>
                                        </tr>
                                    </thead>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$details['id']}}</td>
                                            <td>{{$details['quantity']}}</td>
                                            <td>{{$details['size']}}</td>
                                            <td>{{$details['remaining_quantity']}}</td>
                                            <td>{{$details['unit_price']}}</td>
                                        </tr>
                                    </tbody>
                                    <!-- Hidden input fields on the form-->
                                    <input type="hidden" name="id" value="{{ $details['id'] }}">
                                    <input type="hidden" name="quantity" value="{{ $details['quantity'] }}">
                                    <input type="hidden" name="size" value="{{ $details['size'] }}">
                                    <input type="hidden" name="remaining_quantity" value="{{ $details['remaining_quantity'] }}">
                                    <input type="hidden" name="unit_price" value="{{ $details['unit_price'] }}">

                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-fixed" style="bottom: 0px; right: 0px;"> 
                <button type="submit" name="submit" value="add" class="btn btn-primary"> Add New Item </button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary"> Submit Order </button>
                <button type="submit" name="submit" value="clear" class="btn btn-primary"> Clear Order </button>
            </div>
        </form>
    </x-app-layout>
</body>
<script>
    $("document").ready(function() {
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 1000);
    });
</script>