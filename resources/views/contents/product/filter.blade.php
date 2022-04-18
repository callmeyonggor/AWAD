@extends('layouts.app')

@section('content')

<body id="reload">
    <div class="container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="cars-card-col">
                            <div class="row">
                                <div class="col">
                                    <h6>Filter By</h6>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        {!! Form::select('category', $category_sel, @$search['category'], ['class' => 'form-control select_active','id' => 'category']) !!}
                                    </div>
                                    <div class="col-6">
                                        {!! Form::select('product_order_by', $product_order_by_sel, @$search['product_order_by'], ['class' => 'form-control select_active','id' => 'order_by']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button class="btn cars-btn-default">
                                    <a href="reset_filter">Reset</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            @foreach($record as $val)
                            <div class="col-3">
                                <div class="card-body hover">
                                    <a href="/product/detail/{{$val->id}}" style="text-decoration: none;">
                                        <img src='/storage/img/{{$val->name}}/{{$val->name}}(1).jpeg' alt="{{$val->name}}" class="img-thumbnail">
                                        <h5 class="text-center text-dark font-weight-bold">{{$val->name}}</h5>
                                        <p class="text-center text-dark">RM {{$val->unit_price}}</p>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#category').on('change', function() {
            filter();
        })

        $('#order_by').on('change', function() {
            filter();
        })
    })

    function filter() {
        var category = $('#category').val();
        var order_by = $('#order_by').val();
        $.ajax({
            type: "GET",
            data: {
                'category': category,
                'order_by': order_by
            },
            url: "{{ route('product_filter') }}",
            success: function(data) {
                $('#reload').html(data);
            }
        })
    }
</script>

@endsection