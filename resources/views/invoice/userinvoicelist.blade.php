@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-30">
            <div class="card">
                <div class="card-header">{{__('History')}}</div>
                <div class="card-body">
                    <Table class="table" border=1 style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Total Payment</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            @can('view', $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['invoice_total']}}</td>
                                <td>{{$item['created_at']}}</td>
                                <td><a href={{"order/".$item['id']}}><button type="button"
                                            class="btn btn-success">View</button></a>
                                </td>
                            </tr>
                            @endcan
                            @endforeach
                        </tbody>
                    </Table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection