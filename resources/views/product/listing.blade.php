<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<body>
    <form method="POST" action="{{ route('product_listing') }}">
        @csrf
        <div class="card">
            <div class="cars-card-col">
                <div class="row">
                    <div class="col">
                        <h6>Filter By</h6>
                    </div>
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
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row">
            @foreach($record as $val)
            <div class="col-3">
                <div class="card-body">
                    <h5 class="card-header">{{$val->name}}</h5>
                    <img src='/storage/img/{{$val->name}}.jpg' alt="blackshirt" class="img-thumbnail">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>