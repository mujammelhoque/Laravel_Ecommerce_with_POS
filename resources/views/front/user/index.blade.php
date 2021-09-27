@extends('layout.front')
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group user">
                <li class="list-group-item active"><a href="{{ url('/profile') }}">User Details</a></li>
                <li class="list-group-item"><a href="{{ url('/profile/edit') }}">Edit Profile</a></li>
                <li class="list-group-item"><a href="{{ route('order.profile') }}">Order Details</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <table class="table borderd">
                @if ($user)
                    <tr>
                        <th><strong>Full Name</strong></th>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                    </tr>
                    <tr>
                        <th><strong>Gender</strong></th>
                        <td>
                            @if ($user->gender == 'm')
                                Male
                            @elseif($user->gender == 'f')
                                Female
                            @else
                                Other
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><strong>Email</strong></th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th><strong>Phone</strong></th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th><strong>Location</strong></th>
                        <td>{{ $user->address1 . ', ' . $user->city . ', ' . $user->state . ', ' . $user->zip . ', ' . $user->country }}
                        </td>
                    </tr>
                    <tr>
                        <th><strong>Last name</strong></th>
                        <td>{{ $user->last_name }}</td>
                    </tr>
                @endif

            </table>
        </div>
    </div>
@endsection

@section('script')
    Script Here
@endsection
