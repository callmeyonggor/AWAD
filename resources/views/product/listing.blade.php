<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 my-2">
                        <input type="text" class="form-control select_active" name="freetext" value="{{@$search['freetext']}}" placeholder="Search by keyword">
                        {!! Form::select('size', $size_sel, @$search['size'], ['class' => 'form-control select_active']) !!}
                        {!! Form::select('product_order_by', $product_order_by_sel, @$search['product_order_by'], ['class' => 'form-control select_active']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="float-right">
                <button type="submit" class="btn btn-success mr-2" name="submit" id="search" value="search">
                    Search
                </button>

                <button type="submit" class="btn cars-btn-default" name="submit" value="reset">
                    Reset
                </button>
            </div>
        </div>
        <div>
            <img src="{{URL::asset('/storage/img/blackshirt.jpg')}}" alt="blackshirt" height="200" width="200">
            <p>blackshirt</p>
            <img src="{{URL::asset('/storage/img/whiteshirt.jpg')}}" alt="whiteshirt" height="200" width="200">
            <p>whiteshirt</p>
            <!-- Product data from database -->
        </div>
    </form>
    </div>
</body>