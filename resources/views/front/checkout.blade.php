@extends('layout.front')
@section('style')

@endsection
@section('content')
    <ul class="b-crumbs">
        <li>
            <a href="{{ url('/') }}">
                Home
            </a>

        </li>
        <li>
            <span>Checkout</span>
        </li>
    </ul>
    <h1 class="main-ttl text-center pb-3"><span>Checkout</span></h1>

    <div class="row" style="margin-bottom: 10px">
        <form action="{{ url('/order') }}" method="post">
            <div class="col-md-9">
                <h1 class="main-ttl"><span>Shipping Address</span></h1>

                @csrf
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required value="{{ old('full_name') }}">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" required value="{{ old('company_name') }}">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="address">Address</label>
                        <input type="address" name="address" id="address" class="form-control" required value="{{ old('address') }}">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="country">Country</label>
                        <input type="country" name="country" id="country" class="form-control" required value="{{ old('country') }}">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="state">State</label>
                        <input type="state" name="state" id="state" class="form-control" required value="{{ old('state') }}">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="city">City</label>
                        <input type="city" name="city" id="city" class="form-control" required value="{{ old('city') }}">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="note">Note</label>
                        <textarea name="note" name="note" id="note" class="form-control" cols="5" rows="10"></textarea>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <h1 class="main-ttl"><span>Payment Details</span></h1>
                <table class="table table-bordered">
                    <tr>
                        <th><b>Total</b></th>
                        <td>{{ session('total') }}</td>
                        <input type="hidden" name="total" value="{{ session('total') }}">
                    </tr>
                    <tr>
                        <th><b>Discount (%)</b></th>
                        <td>{{ session('discount') }}</td>
                        <input type="hidden" name="discount" value="{{ session('discount') }}">
                    </tr>
                    <tr>
                        <th><b>Subtotal:</b></th>
                        <td>{{ session('subtotal') }}</td>
                        <input type="hidden" name="subtotal" value="{{ session('subtotal') }}">
                    </tr>
                </table>
                <label>Payment Type</label>
                <select name="payment_type" id="" class="form-control">
                    <option value="cash" selected>Cash</option>
                    <option value="online">Online</option>
                </select>
                <div style="margin-top: 12px">
                    <input type="submit" value="Order Now" class="btn btn-danger form-control">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')

@endsection
