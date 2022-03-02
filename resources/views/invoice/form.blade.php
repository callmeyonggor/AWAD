<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="invoice_id">Invoice ID</label>
                <input type="text" class="form-control" id="invoice_id" placeholder="{{$post->id}}" readonly> 
            </div>
            <div class="form-group">
                <label for="invoice_total">Invoice Total</label>
                <input type="password" class="form-control" id="invoice_total" placeholder="{{$post->invoice_total}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>