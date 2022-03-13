<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form action="" method="POST" >
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
                            <h5>sizes:
                                @foreach($size as $size_type)
                                <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="{{$size_type}}" name="size" value="{{$size_type}}">
                                    {{$size_type}}
                                </button>
                                @endforeach
                            </h5>
                            <div class="form-outline col-4">
                                <label class="form-label" for="typeNumber">Quantity Input</label>
                                <input type="number" id="typeNumber" class="form-control" />
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
</body>
<script>
    $(document).ready(function() {
        $("body").tooltip({
            selector: '[data-toggle=tooltip]'
        });
    });
</script>