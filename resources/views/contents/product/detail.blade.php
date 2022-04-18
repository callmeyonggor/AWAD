@extends('layouts.app')
@section('content')

<body>
    @if ($errors->any())
    <div id="errormessage" class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
        @endforeach
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/product/order" method="POST">
                        @csrf
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="img-thumbnail" src='/storage/img/{{$record->name}}/{{$record->name}}(1).jpeg' />
                                            <img class="img-thumbnail" src='/storage/img/{{$record->name}}/{{$record->name}}(2).jpeg' />
                                        </div>
                                        <div class="col-2">
                                            <img class="img-thumbnail" src='/storage/img/{{$record->name}}/{{$record->name}}(3).jpeg' />
                                            <img class="img-thumbnail" src='/storage/img/{{$record->name}}/{{$record->name}}(4).jpeg' />
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="product-title">{{$record->name}}</h3>
                                            <p class="product-description">{{$record->description}}</p>
                                            <h4 class="price">Unit price: <span>{{$record->unit_price}}</span></h4>
                                            <h5>Sizes:</h5>
                                            {!! Form::select('size', $size, @$post->size, ['class' => 'form-control select_active']) !!}
                                            <div class="form-outline col-4">
                                                <label class="form-label" for="typeNumber">Quantity Input</label>
                                                <input type="number" id="typeNumber" class="form-control" name="quantity" value="{{ @$post->quantity }}"/>
                                                <input type="hidden" class="form-control" name="id" value="{{$record->id}}" />
                                            </div>
                                            <!-- <input type="file" class="filepond"> -->
                                            <div class="position-absolute bottom-0 end-0">
                                                <button class="btn btn-default" type="submit" name="submit" value="cancel">Cancel</button>
                                                <button class="btn btn-default btn-primary" type="submit" name="submit" value="add">Add to list</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $("document").ready(function() {
        setTimeout(function() {
            $('#errormessage').fadeOut('fast');
        }, 1000);
    });
</script>

@endsection