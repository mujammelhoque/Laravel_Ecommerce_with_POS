@extends('layout.main')
@section('title')
   Reports
@endsection
@section('style')
@endsection


@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header bg-dark text-white ">
                <h3 class="card-title  "><i class="fas fa-chart-line"></i> &nbsp; Graphical Reports</h3>
            </div>
                <div class="list-group">
                    <a class="list-group-item" href="{{url('reports/graphical_summary_categories')}}">Categories</a>
                    {{-- <a class="list-group-item" href="{{url('reports/graphical_summary_customers')}}">Customers</a> --}}
                    {{-- <a class="list-group-item" href="{{url('reports/graphical_summary_discounts')}}">Discounts</a> --}}
                    {{-- <a class="list-group-item" href="{{url('reports/graphical_summary_employees')}}">Employees</a> --}}
                    <a class="list-group-item" href="{{url('reports/graphical_summary_items')}}">Items</a>
                    {{-- <a class="list-group-item" href="{{url('reports/graphical_summary_payments')}}">Payments</a> --}}
                    <a class="list-group-item" href="{{url('reports/graphical_summary_sales')}}">Sale</a>
                    <a class="list-group-item" href="{{url('reports/graphical_summary_suppliers')}}">Suppliers</a>
                    {{-- <a class="list-group-item" href="{{url('reports/graphical_summary_taxes')}}">Taxes</a> --}}
                </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header bg-dark text-white ">
                <h3 class="card-title  "><i class="fas fa-list-ul"></i> &nbsp; Summary Reports</h3>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="{{url('reports/summary_categories')}}">Categories</a>
                {{-- <a class="list-group-item" href="{{url('reports/summary_customers')}}">Customers</a> --}}
                {{-- <a class="list-group-item" href="{{url('reports/summary_discounts')}}">Discounts</a> --}}
                <a class="list-group-item" href="{{url('reports/summary_employees')}}">Employees</a>
                <a class="list-group-item" href="{{url('reports/summary_items')}}">Items</a>
                {{-- <a class="list-group-item" href="{{url('reports/summary_payments')}}">Payments</a> --}}
                <a class="list-group-item" href="{{url('reports/summary_sales')}}">Sale</a>
                <a class="list-group-item" href="{{url('reports/summary_suppliers')}}">Suppliers</a>
                {{-- <a class="list-group-item" href="{{url('reports/summary_taxes')}}">Taxes</a> --}}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white ">
                <h3 class="card-title"><i class="far fa-list-alt"></i>&nbsp; Detailed Reports</h3>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="{{url('reports/detailed_taxes')}}">Sale</a>
                <a class="list-group-item" href="{{url('reports/detailed_receivings')}}">Receivings</a>
                {{-- <a class="list-group-item" href="{{url('reports/specific_customer')}}">Customers</a>
                <a class="list-group-item" href="{{url('reports/specific_discount')}}">Discounts</a>
                <a class="list-group-item" href="{{url('reports/specific_employee')}}">Employees</a> --}}
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white ">
                <h3 class="card-title"><i class="fas fa-book"></i>&nbsp;Inventory Reports</h3>
            </div>
            <div class="list-group">
                <a class="list-group-item" href="{{url('reports/inventory_low')}}">Low Inventory</a>
                <a class="list-group-item" href="{{url('reports/inventory_summary')}}">Inventory Summary</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection


