@extends('layout.front')
@section('style')

@endsection
@section('content')
{{-- {{ Auth::user()->role }} --}}
    <ul class="b-crumbs">
        <li>
            <a href="{{ url('/') }}">
                Home
            </a>

        </li>
        <li>
            <span>Cart</span>
        </li>
    </ul>
    <h1 class="main-ttl"><span>Cart</span></h1>
    <!-- Cart Items - start -->
    <form action="cart.html#">

        <div class="cart-items-wrap">
            <table class="cart-items">
                <thead>
                    <tr>
                        <td class="cart-image">Photo</td>
                        <td class="cart-ttl">Products</td>
                        <td class="cart-price">Price</td>
                        <td class="cart-quantity">Quantity</td>
                        <td class="cart-summ">Summ</td>
                        <td class="cart-del">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($cart_products as $item)

                        <tr>
                            <td class="cart-image">
                                <a href="product.html">
                                    <img src="{{ asset($item->item->baseimage) }}" alt="{{ $item->item->name }}">
                                </a>
                            </td>
                            <td class="cart-ttl">
                                <a href="{{ url('product/' . $item->item->id) }}">{{ $item->item->name }}</a>
                                {{-- <p>Color: Red</p>
                                <p>Size: XS</p> --}}
                            </td>
                            <td class="cart-price">
                                <b>{{ $item->item->unit_price }}</b>
                            </td>
                            <td class="cart-quantity">
                                <p class="cart-qnt">
                                    <input name="qty" id="qty" value="{{ $item->quantity }}" type="text">
                                    <a href="cart.html#" class="cart-plus"><i class="fa fa-angle-up"></i></a>
                                    <a href="cart.html#" class="cart-minus"><i class="fa fa-angle-down"></i></a>
                                </p>
                            </td>
                            <td class="cart-summ">
                                <b>{{ $item_price_total = $item->item->unit_price * $item->quantity }}</b>
                                <p class="cart-forone">unit price <b>$220</b></p>
                            </td>
                            <td width="15%">
                                <a href="{{ url('cart/' . $item->id . '/destroy') }}" class="btn btn-danger">Delete</a>
                                <a id="update" href="#" data-id="{{ $item->id }}" class="btn btn-info">Update</a>
                            </td>
                        </tr>
                        @php
                            $total += $item_price_total;
                        @endphp
                    @empty
                        <tr>
                            <td class="text-danger text-center" colspan="5">
                                No Product Found In Cart
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-9 text-end"></div>
            <div class="col-md-3 text-end">
                <ul class="cart-total">
                    <li class="cart-summ">TOTAL: <b>${{ $total }}</b></li>
                </ul>
                <ul class="cart-total">
                    <li class="cart-summ">Disscount ({{ $discount ?? 0 }} %):
                        <b>${{ $discount = ($discount / 100) * $total }}</b>
                        {{ session(['discount' => $discount]) }}
                    </li>
                </ul>
                <ul class="cart-total">
                    <li class="cart-summ">Sub Total: <b>${{ $subtotal = $total - $discount }}</b></li>

                    {{ session(['total' => $total]) }}
                    {{ session(['subtotal' => $subtotal]) }}
                </ul>
            </div>
        </div>

        <div class="cart-submit">
            <div class="cart-coupon">
                <input placeholder="your coupon" id="coupon_code" type="text" @if ($coupon != ' ')value="{{ $coupon }}" {{ session(['coupon_code' => $coupon]) }} @endif>
                {{-- <a class="cart-coupon-btn" id="apply" href=""><img src="{{ asset('front') }}/img/ok.png"
                        alt="your coupon"></a> --}}
                <div>
                    @if ($coupon_msg == 'valid')
                        <span class="text-success">Valid Coupon</span>
                    @else
                        <span class="text-danger">{{ $coupon_msg }}</span>

                    @endif
                </div>
                <button class="btn btn-info" id="apply" type="button"><img src="{{ asset('front') }}/img/ok.png"
                        alt="your coupon"></button>

            </div>
            <a href="{{ route('checkout.product') }}" class="cart-submit-btn">Checkout</a>
            <a href="cart.html#" class="cart-clear">Clear cart</a>
        </div>
    </form>
    <!-- Cart Items - end -->

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("a#update").on('click', function() {
                var quantity = $('#qty').val();
                var id = $(this).attr('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('update.cart') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        qty: quantity
                    },
                    success: function(response) {
                        if (response == "updated") {
                            toastr.success("Cart Updated Successfully")
                            setInterval(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    }
                });


            });
            $('#apply').click(function() {
                var coupon_code = $('#coupon_code').val();
                var current_url = '{{ url('cart') }}/' + coupon_code;
                // alert(current_url);
                window.location = current_url;
            });
        });
    </script>

@endsection
