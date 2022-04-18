@extends('layouts.auth')

<style>
    .container_table {
        float:right;
        width: 85%;
    }
</style>

@section('content')

<div class="container_table">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    This is Inventory Table
                    <div id="inventorypage"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/app.js"></script>
@endsection






