<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<<<<<<< Updated upstream:resources/views/product/listing.blade.php
<body>
    <form method="POST" action="{{ route('product_listing') }}">
        @csrf
        <div class="card">
            <div class="cars-card-col">
=======
<body id="reload">
    <div class="card">
        <div class="cars-card-col">
            <div class="row">
                <div class="col">
                    <h6>Filter By</h6>
                </div>
            </div>
            <div class="container">
>>>>>>> Stashed changes:resources/views/product/filter.blade.php
                <div class="row">
                    <div class="col-4">
                        {!! Form::select('category', $category_sel, @$category , ['class' => 'form-control select_active','id' => 'category']) !!}
                    </div>
<<<<<<< Updated upstream:resources/views/product/listing.blade.php
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" class="form-control select_active" name="freetext" value="{{@$search['freetext']}}" placeholder="Search by keyword">
                        </div>
                        <div class="col-3">
                            {!! Form::select('size', $size_sel, @$search['size'], ['class' => 'form-control select_active']) !!}
                        </div>
                        <div class="col-3">
                            {!! Form::select('product_order_by', $product_order_by_sel, @$search['product_order_by'], ['class' => 'form-control select_active']) !!}
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success mr-2" name="submit" id="search" value="search">
                        Search
                    </button>

                    <button type="submit" class="btn cars-btn-default" name="submit" value="reset">
                        Reset
                    </button>
                </div>
=======
                    <div class="col-4">
                        {!! Form::select('product_order_by', $product_order_by_sel, @$order_by, ['class' => 'form-control select_active','id' => 'order_by']) !!}
                    </div>
                </div>
            </div>
            <div class="float-right">
                <button class="btn cars-btn-default">
                    <a href="reset_filter">Reset</a>
                </button>
>>>>>>> Stashed changes:resources/views/product/filter.blade.php
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($record as $val)
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-header">{{$val->name}}</h5>
<<<<<<< Updated upstream:resources/views/product/listing.blade.php
                    <img src='/storage/img/{{$val->name}}.jpg' alt="blackshirt" class="img-thumbnail">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
=======
                    <div class="border p-2">
                        <img src='/storage/img/{{$val->name}}.jpg' alt="{{$val->name}}" class="img-fluid img-thumbnail">
                        <p class="text-center">{{$val->unit_price}}</p>
                        <a href="/product/detail/{{$val->id}}" class="btn btn-info btn-block">{{$val->name}} Detail</a>
                    </div>
>>>>>>> Stashed changes:resources/views/product/filter.blade.php
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
<<<<<<< Updated upstream:resources/views/product/listing.blade.php

</html>
=======
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
>>>>>>> Stashed changes:resources/views/product/filter.blade.php
