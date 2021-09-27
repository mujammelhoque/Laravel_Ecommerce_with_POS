@extends('layout.main')
@section('title')
    Add Attributes
@endsection
@section('style')
@endsection


@section('content')
    <div class="w-50  m-auto">
        <div>
            <a href="{{ url('items/attributes') }}" class="btn btn-danger"><i class="fas fa-chevron-left"></i></a>
        </div>
        <div class="card ">
            <div class="card-header bg-info text-center">
                <h4> Add Attributes</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('attributes.add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="value">Value</label>
                        <input type="text" name="value" id="value" class="form-control"
                            placeholder="For multiple value sepereted by , (coma)">
                        @error('value')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" value="add" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('script')
@endsection
