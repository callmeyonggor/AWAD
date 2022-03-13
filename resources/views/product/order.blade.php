<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form method="POST" action="/product/submit_order">
        @csrf
        <div class="container">
            @if(Session::has('success_msg'))
            <div id="successMessage" class="alert alert-success">
                {!!Session::get('success_msg')!!}
            </div>
            @endif
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
        <div class="float-right">
            <button type="submit" name="submit" value="add" class="btn btn-primary"> Add New Item </button>
            <button type="submit" name="submit" value="submit" class="btn btn-primary"> Submit Order </button>
            <button type="submit" name="submit" value="clear" class="btn btn-primary"> Clear Order </button>
        </div>
    </form>
</body>

<script>
    $("document").ready(function() {
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 1000);
    });
</script>