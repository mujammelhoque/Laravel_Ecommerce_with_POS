@extends('layout.main')
@section('title')
    Web Order
@endsection
@section('style')

@endsection


@section('content')
    <div class="text-center">
        <h2 class="p-5">Web Orders</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-white" style="background-color: #2b3d4f !important;">
                    <tr>
                        <th>Invoice Id</th>
                        <th>User</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th>Shipping Details</th>
                        <th>Items</th>
                        <th>Payment Type</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales as $item)
                        <tr>
                            <td>{{ $item->invoice_id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->finaltotal }}</td>
                            <td>
                                @php
                                    $shipping = \App\Models\ShippingDetails::where('sales_id', $item->id)->first();
                                @endphp
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#mod{{ $item->id }}">
                                    <i class="fas fa-street-view"></i>
                                </button>
                                <div class="modal fade" id="mod{{ $item->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Invoice ID:
                                                    {{ $item->invoice_id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-borderd">
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $shipping->full_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <td>{{ $shipping->company_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $shipping->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone</th>
                                                        <td>{{ $shipping->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{ $shipping->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Coutnty</th>
                                                        <td>{{ $shipping->country }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>State</th>
                                                        <td>{{ $shipping->state }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td>{{ $shipping->city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Note</th>
                                                        <td>{{ $item->note }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">OK</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @php
                                    $sales_items = \App\Models\SalesItem::with('item')
                                        ->where('sales_id', $item->id)
                                        ->get();
                                @endphp
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#item{{ $item->id }}">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                <div class="modal fade" id="item{{ $item->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered  modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Invoice ID:
                                                    {{ $item->invoice_id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-borderd">
                                                    <thead class="text-white"
                                                        style="background-color: hsla(210,29%,24%,1);">
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($sales_items as $s_item)
                                                        <tr>
                                                            <td><img width="100px"
                                                                    src="{{ asset($s_item->item->baseimage) }}" alt=""
                                                                    srcset=""></td>
                                                            <td>{{ $s_item->item->name }}</td>
                                                            <td>{{ $s_item->quantity }}</td>
                                                            <td>{{ $s_item->unit_price }}</td>
                                                            <td>{{ $s_item->quantity * $s_item->unit_price }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">OK</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $item->payment_type }}
                            </td>
                            <td>
                                @if ($item->order_status == 'pending')
                                    <span class="text-danger">{{ $item->order_status }}</span>
                                @elseif($item->order_status == 'processing')
                                    <span class="text-success tw-bolder">{{ $item->order_status }}</span>
                                @else
                                    <span class="text-info tw-bolder">{{ $item->order_status }}</span>
                                @endif

                            </td>
                            <td>
                                <select name="order_status" id="order_status" class="form-control"
                                    data-id={{ $item->id }}>
                                    <option {{ $item->order_status == 'pending' ? 'selected' : '' }} value="pending">
                                        Pending
                                    </option>
                                    <option {{ $item->order_status == 'processing' ? 'selected' : '' }}
                                        value="processing">
                                        Processing</option>
                                    <option {{ $item->order_status == 'shipped' ? 'selected' : '' }} value="shipped">
                                        Shipped
                                    </option>
                                </select>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No Order Found</td>
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
            $('select#order_status').on('change', function() {
                var id = $(this).attr('data-id');
                var order_status = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('update.status') }}",
                    method: 'post',
                    data: {
                        id: id,
                        order_status: order_status
                    },
                    success: function(response) {
                        if (response == 'shipped') {
                            toastr.success('Your Order is Shipped')
                        } else if (response == 'processing') {
                            toastr.warning('Your Order is Processing!!')
                        } else {
                            toastr.error('Your Order is Pending!!')
                        }
                        setTimeout(() => {
                            location.reload();
                        }, 800);
                    }
                });

            });
        });
    </script>
@endsection
