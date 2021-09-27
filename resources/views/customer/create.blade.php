@extends('layout.main')

@section('title')
    New Customer
@endsection

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @include('partial.formerror')
                <form action="{{ route('customer.store') }}" class="row g-3" method="POST">
                    @csrf

                    @include('customer.form')
                    <div class="clearfix"></div>
                    <div class="col-sm-12 text-end">
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <div class="clearfix"></div>
@endsection

@section('script')
@endsection
