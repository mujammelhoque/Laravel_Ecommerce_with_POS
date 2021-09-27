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
                        <div class="alert alert-warning">{{session('fail')}}</div>
                    @endif
                    {!! Form::model($suppliers,['route'=>['suppliers.update',$suppliers->id]]) !!}
                    @method('PATCH')
                    <div class="row">
                        @include('suppliers.form')
                        <div class="col-md-4 mb-2">
                            {!! Form::submit('Update',['class'=>'btn btn-info']) !!}
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
