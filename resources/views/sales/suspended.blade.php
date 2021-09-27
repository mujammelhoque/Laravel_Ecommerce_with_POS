@extends('layout.main')
@section('title')
    Add New Suppliers
@endsection
@section('style')
@endsection


@section('content')
    <div class="card m-auto" style="width: 50%">
        <div class="card-header text-center bg-success text-white"> Suspended</div>
        <div class="card-body">
            <table id="suspended_sales_table" class="table table-striped table-hover">
                <thead>
                    <tr bgcolor="#CCC">
                        <th>ID</th>
                        <th>Sale Date</th>
                        <th>Name</th>
                        <th>Comments</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="table-footer text-end">
            <a class="btn btn-secondary" href="{{ url('/sales') }}"> Back</a>
        </div>
    </div>

@endsection
@section('script')
@endsection
