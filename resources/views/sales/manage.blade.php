@extends('layout.main')
@section('title')
    Manage Sale
@endsection
@section('style')
@endsection


@section('content')
    <div class="text-center sales d-none">
        <h1>Sales Report</h1>
    </div>
    {{-- <div class="row">
        <div class="col-12">
            <div class="btn-toolbar d-md-flex justify-content-md-end">
                <a href="{{ url('/sales') }}" class=" btn mybtn-info fw-light"><i class="fas fa-cart-arrow-down"></i> &nbsp;
                    Sales Register</a>

                @if (count($all_sales) > 0)
                    @isset($all_sales)
                        &nbsp; <a href="#" onclick="window.print();" class=" btn mybtn-info fw-light"><i
                                class="fas fa-print"></i> &nbsp; Print</a>
                    @endisset
                @endif

            </div>
        </div>
    </div> --}}
    <div class="row mt-5">

        <div class="col-6 d-inline-block">

            <a href="{{ url('/sales') }}" class=" btn mybtn-info fw-light"><i class="fas fa-cart-arrow-down"></i> &nbsp;
                Sales Register</a>

            @if (count($all_sales) > 0)
                @isset($all_sales)
                    &nbsp; <a href="#" onclick="window.print();" class=" btn mybtn-info fw-light"><i class="fas fa-print"></i>
                        &nbsp; Print</a>
                @endisset
            @endif
            {{-- <button id="dbtn" class="btn btn-secondary fas fa-trash-alt fw-light" disabled="'ture">&nbsp; Delete</button>
            <input type="text" value="08/14/2021 - 08/14/2021" name="daterange">
            <button class="btn btn-default btn-sm dropdown-toggle border-1" title="Export data" data-bs-toggle="dropdown"
                type="button" aria-expanded="true">
                Nothing Selected </button>
            <ul class="dropdown-menu" role="menu">
                <li>Cash</li>
                <li>Invoice</li>
            </ul> --}}
        </div>
        <div class="col-3">

        </div>
        <div class="col-3 d-flexd-md-flex justify-content-md-end">
            <div class="row">
                <div class="col-6">

                </div>
                {{-- <div class="col-2 me-2">
                    <div class="bt1">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="fas fa-th"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li><input type="checkbox" name="" id=""> Id</li>
                                <li><input type="checkbox" name="" id=""> Last Name</li>
                                <li><input type="checkbox" name="" id=""> First Name</li>
                                <li><input type="checkbox" name="" id=""> Email</li>
                                <li><input type="checkbox" name="" id="" checked> Phone Number</li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-2">
                    <div class="btn2">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-external-link-alt"></i>
                            </button>
                            <ul class="dropdown-menu em-dropdown" aria-labelledby="btnGroupDrop1">
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'json'});">Json</a></li>
                                <li><a class="dropdown-item" href="#">XML</a></li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'csv'});">CSV</a></li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'pdf'});">PDF</a></li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'doc'});">Doc</a></li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'json'});">Json</a> </li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'sql'});">SQL</a></li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'txt'});">TXT</a></li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'xml'});">XML </a></li>
                                <li><a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'xlsx'});">Xlsx </a></li>
                                <li> <a class="dropdown-item" href="javascript:void (0)"
                                        onclick="$('table').tableExport({type:'xls'});">MS Excel </a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <table id="managetable" class="table table-striped table-bordered dataTable" style="width: 100%;"
                    role="grid" aria-describedby="example_info">
                    <thead>
                        <tr>
                            {{-- <th scope="row"><input type="checkbox" name="" id="checkall"> Id </th> --}}
                            <th>Time</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Sub Total</th>
                            <th>Payment Type</th>
                            <th>Invoice#</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse($all_sales as $sale)
                            <tr>
                                {{-- <th scope="row"><input type="checkbox" name="" id="checkone"> 1</th> --}}
                                <td>{{ \Carbon\Carbon::parse($sale->created_at)->isoFormat('h:mm:s') }}</td>
                                <td>{{ $sale->customer->first_name }}</td>
                                <td>{{ $sale->total }}</td>
                                <td>{{ $sale->discount }}</td>
                                <td>{{ $sale->finaltotal }}</td>
                                <td>{{ $sale->payment_type }}</td>
                                <td>{{ $sale->invoice_id }}</td>
                                <td><a href="{{ route('download.invoice', ['id' => $sale->id]) }}" class="btn btn-info">
                                        <i class="fas fa-download"></i></a>
                                    <a href="{{ route('sales.destroy', ['id' => $sale->id]) }}" class="btn btn-info">
                                        <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-danger text-center">Not Data Found</td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('#checkall').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('button#dbtn').attr('disabled', false);
                        $('button#ebtn').attr('disabled', false);
                    } else {
                        $('button#dbtn').attr('disabled', true);
                        $('button#ebtn').attr('disabled', true);
                    }

                });

            });
        </script>
    @endsection
