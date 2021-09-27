@extends('layout.main')
@section('title')
    User Management
@endsection
@section('style')
@endsection


@section('content')
    <div class="text-center">
        <h2 class="p-5">Users Permission</h2>
    </div>
    <div class="text-end">
        <a href="{{ route('add.user') }}" class="btn btn-danger"><i class="fas fa-plus"></i></a>
    </div>
    <table class="table table-striped">
        <thead class="bg-secondary text-white">
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Change Permission</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <form action="{{ route('change.permission') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role == '1')
                                <span class="text-primary"><strong>Administator</strong></span>
                            @elseif($user->role == '2')
                                <span class="text-danger">Web User</span>
                            @elseif($user->role == '3')
                                <span class="text-info">Supplier</span>
                            @elseif($user->role == '4')
                                <span class="text-secondary">Manager</span>
                            @else
                                <span class="text-worning">Operator</span>
                            @endif
                        </td>
                        <td>
                            <select name="role" id="" class="form-control">
                                <option {{ $user->role == '1' ? 'selected' : '' }} value="1">Administator</option>
                                <option {{ $user->role == '2' ? 'selected' : '' }} value="2">Web User</option>
                                <option {{ $user->role == '3' ? 'selected' : '' }} value="3">Supplier</option>
                                <option {{ $user->role == '4' ? 'selected' : '' }} value="4">Manager</option>
                                <option {{ $user->role == '5' ? 'selected' : '' }} value="5">Operator</option>
                            </select>
                        </td>
                        <td><button type="submit" class="btn btn-secondary">Update</button></td>
                    </tr>
                </form>
            @empty
                <tr>
                    <td colspan="5">No User Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
@section('script')
@endsection
