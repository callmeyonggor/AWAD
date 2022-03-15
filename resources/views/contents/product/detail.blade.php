<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product Detail
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="/product/order" method="POST">
                            @csrf
                            <div class="container">
                                <div class="card">
                                    <div class="container-fliud">
                                        <div class="wrapper row">
                                            <div class="preview col-md-6">
                                                <div class="preview-pic tab-content">
                                                    <div class="tab-pane active" id="pic-1"><img src='/storage/img/{{$record->name}}.jpg' /></div>
                                                </div>
                                                <ul class="preview-thumbnail nav nav-tabs">
                                                    <!-- Other picture -->
                                                </ul>
                                            </div>
                                            <div class="details col-md-6">
                                                <h3 class="product-title">{{$record->name}}</h3>
                                                <p class="product-description">{{$record->description}}</p>
                                                <h4 class="price">Unit price: <span>{{$record->unit_price}}</span></h4>
                                                <h5>Sizes:</h5>
                                                {!! Form::select('size', $size, @$search['category'], ['class' => 'form-control select_active']) !!}
                                                <div class="form-outline col-4">
                                                    <label class="form-label" for="typeNumber">Quantity Input</label>
                                                    <input type="number" id="typeNumber" class="form-control" name="quantity" required />
                                                    <input type="hidden" class="form-control" name="id" value="{{$record->id}}" />
                                                </div>
                                                <div class="float-right">
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
    </x-app-layout>

</body>