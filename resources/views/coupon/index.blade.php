@extends('layout.main')
@section('title')
    Coupons
@endsection
@section('style')

@endsection


@section('content')
    <div class="text-center">
        <h2 class="p-5">Coupons</h2>
    </div>
    <div class="text-end"><a href="{{ route('add.coupon') }}" class="btn btn-danger"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-white" style="background-color: #2b3d4f !important;">
                    <tr>
                        <th>Coupon Id</th>
                        <th>Value %</th>
                        <th>Validity</th>
                        <th>Price Limit</th>
                        <th>Used</th>
                        <th>Use Limit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->coupon }}</td>
                            <td>{{ \Carbon\Carbon::parse($coupon->coupon_validity)->diffforhumans() }}</td>
                            <td>{{ $coupon->price_limit }}</td>
                            <td>{{ $coupon->used }}</td>
                            <td>{{ $coupon->max_used }}</td>
                            <td>
                                <a href="{{ route('edit.coupon', ['id' => $coupon->id]) }}" class="btn btn-success"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('delete.coupon', ['id' => $coupon->id]) }}" class="btn btn-danger"><i
                                        class="fas fa-trash-restore"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No Coupon Found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')

@endsection
