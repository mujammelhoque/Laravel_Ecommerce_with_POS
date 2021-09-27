@extends('layout.front')
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group user">
                <li class="list-group-item "><a href="{{ url('/profile') }}">User Details</a></li>
                <li class="list-group-item"><a href="{{ url('/profile/edit') }}">Edit Profile</a></li>
                <li class="list-group-item active"><a href="{{ route('order.profile') }}">Order Details</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <table class="table table-stiped">
                <tr>
                    <th>Invoice Id</th>
                    <th>Total</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th>Order Staus</th>
                    <th>Action</th>
                </tr>
                @if ($details)
                    @forelse ($details as $item)
                        <tr>
                            <td>{{ $item->invoice_id }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->finaltotal }}</td>
                            <td>

                                @if ($item->order_status == 'pending')
                                    <span class="text-danger">{{ $item->order_status }}</span>
                                @elseif($item->order_status == 'processing')
                                    <span class="text-success">{{ $item->order_status }}</span>
                                @else
                                    <span class="text-primary">{{ $item->order_status }}</span>
                                @endif

                            </td>
                            <td>
                                @if ($item->order_status == 'pending')
                                    <a id="cancel" href="javascript:void(0)" data-id="{{ $item->id }}"
                                        class="btn btn-danger">Cancel</a>
                                @else
                                    <a href="{{ route('order.view', ['id' => $item->id]) }}" class="btn btn-primary">View</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-danger text-center">No Order Found</td>
                        </tr>
                    @endforelse

                @endif
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("a#cancel").on('click', function() {
                var id = $(this).attr('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('order.cancel') }}",
                    method: 'post',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response == 'yes') {
                            toastr.success('Order Canceled Successfully !!!!');
                            setInterval(function() {
                                location.reload();
                            }, 1000);

                        } else {
                            toastr.error('Something Worng !!!!');
                            setInterval(function() {
                                location.reload();
                            }, 1000);
                        }
                    }
                });

            });
        });
    </script>
@endsection
