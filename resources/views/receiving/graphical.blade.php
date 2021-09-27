@extends('layout.main')
@section('title')
    {{ ucwords(str_replace('_', ' ', Request::segment(2)) . ' ' . Request::segment(1)) }}
@endsection
@section('style')
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">{{ $data['startDate'] }} To {{ $data['endDate'] }}</h3>
        </div>
        <div class="card-body">
            {{-- Sale Type: {{$saleType}} <br> --}}
            {{-- Location Id: {{$location}} --}}
        </div>
    </div>
@endsection
@section('script')
@endsection
