@extends('layout.main')
@section('title')
    Round-45
@endsection
@section('style')
@endsection


@section('content')
    <div class="row">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Invoice</h2>
                </div>
                <div class="col-12 d-flex justify-content-between">

                    <p> <a href="{{ url('sales') }}" class="btn btn-danger">Back</a></p>
                    <p><a href="javascript:void (0)" id="print" class=" btn mybtn-info fw-light"><i
                                class="fas fa-print"></i>
                            &nbsp; Print</a></p>
                </div>
                <div class="col-6">
                    <p><b> Customer Information:</b>
                        {{ $cus_sale->customer->first_name . ' ' . $cus_sale->customer->last_name . ', A/C:' . $cus_sale->customer->account . ', Email: ' . $cus_sale->customer->email . ', PhoneP: ' . $cus_sale->customer->phone . ', Address: ' . $cus_sale->customer->address1 . ', ' . $cus_sale->customer->address2 . ', ' . $cus_sale->customer->city . ', ' . $cus_sale->customer->state . ', ' . $cus_sale->customer->zip }}
                    </p>
                    <p><strong>Payment Status: </strong>{{ $cus_sale->payment_status }}</p>
                    <p><strong ng>Payment Type: </strong>{{ $cus_sale->payment_type }}</p>
                    <p><strong>Invoice Id: </strong>{{ $cus_sale->invoice_id }}</p>
                </div>
                <div class="col-6 text-end m-auto">
                    <p><strong>Store Employee Name :</strong> {{ $cus_sale->employee->first_name }}</p>
                    <p><strong>Payment Status: </strong>{{ $cus_sale->payment_status }}</p>
                    <p><strong>Payment Type: </strong>{{ $cus_sale->payment_type }}</p>
                    {{-- <p><strong>Invoice Id: </strong>{{ $cus_sale->invoice_id }}</p> --}}
                </div>
                <div class="col-12">
                    <table class="table table-striped">

                        <tr>
                            <th>Item</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Unit_price</th>
                            <th>Total</th>
                        </tr>
                        @php
                            $qty = 0;
                            $price = 0;
                        @endphp
                        @foreach ($items as $item)
                            @php
                                $qty += $item->quantity;
                                $price += $item->unit_price;
                            @endphp
                            <tr>
                                <td>{{ $item->item->name }}</td>
                                <td>{{ $item->item->sku }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->unit_price * $item->quantity }}</td>
                            </tr>

                        @endforeach
                        <hr style="border-bottom: 3px solid">
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>{{ $qty }}</strong></td>
                            <td></td>
                            <td><strong>{{ $qty * $price }}</strong></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-8"></div>
                <div class="col-md-2 bt-1">
                    <strong>Total: </strong> {{ $cus_sale->total }} <br>
                    <strong>Discount: </strong> {{ $cus_sale->discount }} <br>
                    <strong>Sub Total: </strong> {{ $cus_sale->finaltotal }} <br>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('script')
@endsection
