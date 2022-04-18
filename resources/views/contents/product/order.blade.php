@extends('layouts.app')

@section('content')

<body id="test">
    @if(Session::has('success_msg'))
    <div id="errormessage" class="alert alert-success">
        {!!Session::get('success_msg')!!}
    </div>
    @endif
    <form method="POST" action="/product/submit_order">
        @csrf
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <tbody>
                                <tr class="test">
                                    <td class="counterCell"></td>
                                    <td><input name="name[]" value="{{ $details['name'] }}" class="readonly" readonly></td>
                                    <td>
                                        <i class="fa-solid fa-plus {{ $details['id'] }}" id="plus{{ $details['id'] }}{{ $details['size'] }}"></i>
                                        <input type="number" name="quantity[]" value="{{ $details['quantity'] }}" class="readonly col-2" id="quantity{{ $details['id'] }}{{ $details['size'] }}" readonly>
                                        <i class="fa-solid fa-minus {{ $details['id'] }} float-left" id="minus{{ $details['id'] }}{{ $details['size'] }}"></i>
                                    </td>
                                    <td><input name="size[]" value="{{ $details['size'] }}" class="readonly" readonly></td>
                                    <td><input name="unit_price[]" value="{{ $details['unit_price'] }}" id="unitprice{{ $details['id'] }}{{ $details['size'] }}" class="readonly" readonly></td>
                                    <td><input name="subtotal[]" value="{{ $details['quantity'] * $details['unit_price'] }}" class="readonly subtotal" id="subtotal{{ $details['id'] }}{{ $details['size'] }}" readonly></td>
                                    <td>
                                        <button type="button" class="btn btn-danger delete" data-idsize="{{ $details['id'] }}{{ $details['size'] }}" data-id="{{ $details['id'] }}" data-size="{{ $details['size'] }}" data-name="{{ $details['name'] }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <input type="hidden" name="id[]" value="{{ $details['id'] }}">
                                @endforeach
                                @endif
                                <td colspan="5">Total</td>
                                <td><input id="total" class="readonly" name="total" value=" " readonly></input></td>
                            </tbody>
                        </table>
                    </div>

                    <div class="position-absolute bottom-0 end-0">
                        <button type="submit" name="submit" value="add" class="btn btn-success"> Add New Item </button>
                        @if(session('cart'))
                        <button type="submit" name="submit" value="company" class="btn btn-primary"> Confirm Order </button>
                        <button id="clear" class="btn btn-danger"> Clear Order </button>
                        @endif
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

        $(".delete").each(function() {
            var idsize = $(this).attr('data-idsize');
            var quantity = parseInt($('#quantity' + idsize).val());
            var unitprice = parseFloat($('#unitprice' + idsize).val());
            $("#plus" + idsize).click(function() {
                quantity++;
                $('#quantity' + idsize).val(quantity);
                $('#subtotal' + idsize).val(quantity * unitprice);
                calc_total();
            });
            $("#minus" + idsize).click(function() {
                if ($('#quantity' + idsize).val() != 1) {
                    quantity--;
                    $('#quantity' + idsize).val(quantity);
                }

                $('#subtotal' + idsize).val((quantity * unitprice).toFixed(2));
                calc_total();
            });
        });
        $(".delete").click(function(e) {
            var id = $(this).attr('data-id');
            var size = $(this).attr('data-size');
            var name = $(this).attr('data-name');
            e.preventDefault();
            Swal.fire({
                title: "Remove \n" + "Name: " + name + "\n Size: " + size,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#A8B5C9",
                confirmButtonText: "Yes"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        data: {
                            'data': id + size,
                        },
                        url: "{{ route('delete_order') }}",
                        success: function(data) {
                            $('#test').html(data);
                        }
                    })
                }
            });
        });

        $("#clear").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure to clear order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#A8B5C9",
                confirmButtonText: "Yes"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        data: {
                            _token: '{{csrf_token()}}',
                            submit: 'clear'
                        },
                        url: "{{route('submit_order')}}",
                        success: function(data) {
                            $('#test').html(data);
                        },
                    });
                }
            });
        });

        calc_total();

        function calc_total() {
            var sum = 0;
            $(".subtotal").each(function() {
                sum += parseFloat($(this).val());
            });
            $('#total').val(sum.toFixed(2));
        };


    });
</script>
@endsection