@extends('layout.main')
@section('title')
    Edit Coupons
@endsection
@section('style')

@endsection


@section('content')
    <div class="row">
        <div class="col-md-4 m-auto">
            <div>
                <a href="{{ url('/coupons') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
            </div>
            <div class="card">

                <div class="card-header">
                    <h2 class="p-3">Add Coupons</h2>
                </div>
                <div class="card-body">
                    {!! Form::model($coupon, ['route' => ['update.coupon', $coupon->id]]) !!}
                    <input type="hidden" name="id" value="{{ $coupon->id }}">
                    @include('coupon.form')
                    <div class="form-group mb-3">

                        {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
