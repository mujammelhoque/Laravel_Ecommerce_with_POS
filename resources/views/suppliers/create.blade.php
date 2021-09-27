
@extends('layout.main')
@section('title')
    Add Suppliers
@endsection
@section('style')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header">Add New Suppliers</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                        @if(session('fail'))
                            <div class="alert alert-danger">{{session('fail')}}</div>
                        @endif
                    {!! Form::open(['route'=>'suppliers.store']) !!}
                    @method('POST')
                    <div class="row">
                        @include('suppliers.form')
                        <div class="col-md-4 mb-2">
                            {!! Form::submit('Submit',['class'=>'btn btn-info']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
