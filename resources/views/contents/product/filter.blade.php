<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="reload">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Filter
            </h2>
        </x-slot>

        <div class="py-12">
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
                                        <div class="col-4">
                                            {!! Form::select('category', $category_sel, @$search['category'], ['class' => 'form-control select_active','id' => 'category']) !!}
                                        </div>
                                        <div class="col-4">
                                            {!! Form::select('product_order_by', $product_order_by_sel, @$search['product_order_by'], ['class' => 'form-control select_active','id' => 'order_by']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
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
                                    <div class="card-body">
                                        <h5 class="card-header">{{$val->name}}</h5>
                                        <div class="border p-2">
                                            <img src='/storage/img/{{$val->name}}.jpg' alt="{{$val->name}}" class="img-fluid img-thumbnail">
                                            <p class="text-center">{{$val->unit_price}}</p>
                                            <a href="/product/detail/{{$val->id}}" class="btn btn-info btn-block">{{$val->name}} Detail</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
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