@extends('layout.main')
@section('title')
    User Management
@endsection
@section('style')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-4 m-auto">
            <a href="{{ url('/users') }}" class="btn btn-danger"> <i class="fas fa-chevron-left"></i></a>
            <div class="card">
                <div class="card-header text-center bg-secondary text-white">Add User</div>
                <div class="card-body">
                    <form action="{{ route('add.user') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="password_confirmation">Confirmation Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="role">Permission</label>
                            <select name="role" id="" class="form-control">
                                <option value="">Select Permission</option>
                                <option value="1">Administator</option>
                                <option value="2">Web User</option>
                                <option value="3">Supplier</option>
                                <option value="4">Manager</option>
                                <option value="5">Operator</option>
                            </select>

                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="add" class="form-control btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
