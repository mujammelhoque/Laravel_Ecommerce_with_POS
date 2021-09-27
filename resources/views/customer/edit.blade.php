@extends('layout.main')

@section('title')
    New Customer
@endsection

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('partial.formerror')
                {{-- <form action="#" id="customer_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate"> --}}
                {{-- {!! Form::open(['route' => 'customer.store']) !!} --}}
                {!! Form::model($customer, ['method' => 'PATCH', 'route' => ['customer.update', $customer->id]]) !!}
                @csrf
                <div class="row">
                    @include('customer.form')
                </div>
                <div class="col-sm-12 text-end">
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>

    <div class="clearfix"></div>
@endsection

@section('script')
@endsection
