@extends('layout.main')
@section('title')
    Sales Report
@endsection
@section('style')

@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <div><strong>Search Between</strong> :
            {{ \Carbon\Carbon::parse($start_date)->format('Y-m-d') . ' To ' . \Carbon\Carbon::parse($end_date)->format('Y-m-d') }}
        </div>
        <div> <a class="btn btn-danger" href="{{ url('reports/detailed_taxes') }}"><i class="fas fa-chevron-left"></i>
                back</a>
            <a class="btn btn-info" href="#" onclick="window.print();"><i class="fas fa-print"></i>
                Print</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">

            <h1>Sales Reports </h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>SKU</th>
                        <th>Cost Price</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @php
                    $cost_price = 0;
                    $unit_price = 0;
                @endphp
                <tbody>
                    @forelse ($sales_items as $item)
                        <tr>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ $item->item->sku }}</td>
                            <td>{{ $item->cost_price }}</td>
                            @php
                                $cost_price += $item->cost_price * $item->quantity;
                            @endphp
                            <td>{{ $item->unit_price }}</td>
                            @php
                                $unit_price += $item->unit_price * $item->quantity;
                            @endphp
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $total = $item->quantity * $item->unit_price }}</td>
                        </tr>
                </tbody>
            @empty
                <tbody>
                    <tr>
                        <td colspan="6">No Low Inventory Found</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="6" align="center">
                            <p class="p-0 m-0"><strong>Sell Price:</strong> {{ $unit_price }}</p>
                            <p class="p-0 m-0"><strong>Cost Price:</strong> {{ $cost_price }}</p>
                            <p class="p-0 m-0"><strong>
                                    Profit @if (Request::segment(2) == 'detailed_receivings')
                                        Will be
                                    @endif
                                    :</strong> {{ $unit_price - $cost_price }}</p>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td colspan="6" align="center">
                            <h3>Unit Price: {{ $unit_price }}</h3>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="6" align="center">
                            <h3>Profit: {{ $unit_price - $cost_price }}</h3>
                        </td>
                    </tr> --}}
                </tbody>

            </table>
        </div>
    </div>


@endsection
@section('script')
@endsection
