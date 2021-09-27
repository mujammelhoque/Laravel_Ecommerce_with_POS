@extends('layout.front')
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group user">
                <li class="list-group-item "><a href="{{ url('/profile') }}">User Details</a></li>
                <li class="list-group-item active"><a href="{{ url('/profile/edit') }}">Edit Profile</a></li>
                <li class="list-group-item"><a href="{{ route('order.profile') }}">Order Details</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <form action="{{ route('update.profile') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name ?? '' }}"
                                class="form-control">
                            <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                value="{{ $user->last_name ?? '' }}">
                            <span>@error('last_name') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="    col-md-4">
                        <div class="form-group">
                            <label for="gender">Gender</label> <br>
                            <input type="radio" name="gender" id="male" value="m"
                                class=""> <label
                                for=" male">Male</label>
                            <input type="radio" name="gender" id="female" value="f"
                                class=""> <label
                                for=" female">Female</label>
                            <input type="radio" name="gender" id="other" value="o"
                                class=""> <label
                                for=" other">Others</label>
                            <br> <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                value="{{ $user->phone ?? '' }}">
                            <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" class="form-control"
                                value="{{ $user->country ?? '' }}">
                            <span class="text-danger">@error('country') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $user->address1 ?? '' }}">
                            <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control"
                                value="{{ $user->city ?? '' }}">
                            <span class="text-danger">@error('city') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control"
                                value="{{ $user->state ?? '' }}">
                            <span class="text-danger">@error('state') {{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="zip">Zip Code</label>
                            <input type="text" name="zip" id="zip" class="form-control" value="{{ $user->zip ?? '' }}">
                            <span class="text-danger">@error('zip') {{ $message }} @enderror</span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Update">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    Script Here
@endsection
