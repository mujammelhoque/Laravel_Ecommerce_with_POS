@extends('layout.main')
@section('title')
    Low Inventory
@endsection
@section('style')

@endsection
@section('content')
    <div class="text-end"> <a class="btn btn-info" href="#" onclick="window.print();"><i class="fas fa-print"></i>
            Print</a></div>
    <div class="card">
        <div class="card-header text-center">
            <h1>
                @if (Request::segment(2) == "inventory_summary")
                 Inventories
                    @else
                    Low Inventories
                @endif
                </h1>
        </div>
        <div class="card-body">
            <table id="inventory" class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>SKU</th>
                        <th>Cost Price</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($items as $item)
                    
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->sku }}</td>
                            <td>{{ $item->cost_price }}</td>
                            <td>{{ $item->unit_price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->unit }}</td>
                        </tr>
                    
                @empty
            </tbody>
                    <tbody>
                        <tr>
                            <td colspan="6">No Low Inventory Found</td>
                        </tr>
                    </tbody>
                @endforelse

            </table>
        </div>
    </div>


@endsection
@section('script')
@endsection
