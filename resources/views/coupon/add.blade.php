@extends('layout.main')
@section('title')
    Add Coupons
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
                    <h2 class="p-4 text-center">Add Coupons</h2>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'store.coupon']) !!}
                    @include('coupon.form')
                    <div class="form-group">

                        {!! Form::submit('Add', ['class' => 'btn btn-danger form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
