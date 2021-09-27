@extends('layout.main')
@section('title')
    Add New Suppliers
@endsection
@section('style')
@endsection


@section('content')
    <div class="card m-auto" style="width: 50%">
        <div class="card-header text-center bg-success text-white"> Add New Customer</div>
        <div class="card-body">
            <form action="">
                @csrf
                <div class="fname mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            First Name
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="fname" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="lname mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Last Name
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="lname" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="gender mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Gender
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6"><input type="radio" name="gender"> &nbsp; Male</div>
                                <div class="col-md-6"><input type="radio" name="gender">&nbsp; Female</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Email
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="phone mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Phone
                        </div>
                        <div class="col-md-9">
                            <div class=" input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tty"></i></span>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="address1 mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Address 1
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="address1" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="address2 mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Address 2
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="address2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="City mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            City
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="city" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="state mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            State
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="state" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="zip mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Zip
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="zip" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="country mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Country
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="country" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="comment mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">
                            Comments
                        </div>
                        <div class="col-md-9">
                            <textarea name="comments" id="" cols="6" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="account mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Account #
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="account" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="button mt-2">
                    <div class="row">
                        <div class="col-md-3 p-1 ">

                        </div>
                        <div class="col-md-9 text-end">
                            <input type="submit" name="submit" class="btn btn-dark">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
@endsection
