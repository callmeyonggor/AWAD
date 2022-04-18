@extends('layouts.auth')

<style>
    .container_table {
        float:right;
        width: 80%;
    }
</style>

@section('content')
<div class="container_table">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    Admin Accounts
                    <div id="AdminTable"></div><br>
                    Employee Accounts
                    <div id="EmployeeTable"></div><br>
                    @can('isAdmin')
                    User Accounts
                    <div id="UserTable"></div><br>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/app.js"></script>
@endsection