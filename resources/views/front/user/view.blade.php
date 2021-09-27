@extends('layout.front')
@section('style')

@endsection
@section('content')
    <div>
        <h2 style="text-align: center; font-size:50px; padding:20px 0px">Invoice Details</h2>
    </div>
    {{-- <a href="javascript:void (0)" id="print" class=" btn mybtn-info fw-light"><i class="fas fa-print"></i> &nbsp; Print</a>
    <a href="javascript:void (0)" id="print" onclick="window.print();" class=" btn btn-info fw-light"><i
            class="fas fa-print"></i> &nbsp; Print</a> --}}
    <div style="float: right">
        
        <button class="btn btn-danger" data-id="{{ $sales->id }}" id="download" type="button"> Download Invoice</button>
    </div>
    <div class="row">
        <div class="col-md-3 jumbotron">
            <p><strong>Shippping Details</strong></p>
            <p><strong>Invoice Id: </strong> {{ $sales->invoice_id }}</p>
            <p><strong>Name: </strong> {{ $shiping_details->full_name }}</p>
            <p><strong>Company: </strong>{{ $shiping_details->company_name }}</p>
            <p><strong>Email: </strong>{{ $shiping_details->email }}</p>
            <p><strong>Phone: </strong>{{ $shiping_details->phone }}</p>
            <p><strong>Loaction:
                </strong>{{ $shiping_details->address . ', ' . $shiping_details->city . ', ' . $shiping_details->state . ', ' . $shiping_details->zip . ', ' . $shiping_details->country }}
            </p>

        </div>

        <div class="col-md-9">
            <table class="table table-stiped">
                <tr>
                    <th>Image</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quanity</th>
                    <th>Total</th>
                </tr>
                @forelse ($sales_items as $item)
                    <tr>
                        <td><img width="100px" src="{{ asset($item->item->baseimage) }}" alt=""></td>
                        <td><a target="_blank" href="{{ url('product/'.$item->item->id) }}">{{ $item->item->name }}</a></td>
                        <td>{{ $item->item->cost_price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->quantity * $item->item->cost_price }}</td>
                    </tr>
                @empty

                @endforelse
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
          $('button#download').click(function(){
            var id=  $(this).attr('data-id')
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    url: "{{ route('order.download') }}",
    method: 'post',
    data: {id:id},
    success:function(response){
        console.log(response)
    }
});

          });
        });
    </script>
@endsection
