
@extends('layout.main')
@section('title')
    Update Gift Cards
@endsection
@section('style')
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="card m-auto" style="width: 50%">
            <div class="card-header text-center bg-success text-white"> 
                Update Gift Cards
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
        
                    <div class="email mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1">
                                Customer
                            </div>
                            <div class="col-md-9">
                                <div class=" input-group">   
                                    <input type="text" name="customer" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="email mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 ">
                                Giftcard Number
                            </div>
                            <div class="col-md-9 w-50">
                                <div class=" input-group">
                                    <input type="text" name="gifnumber" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="email mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1">
                                Value
                            </div>
                            <div class="col-md-9 w-25">
                                <div class=" input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                                    <input  type="text" name="value" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="button mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 ">
                            
                            </div>
                            <div class="col-md-9 text-end">
                                <input value="Submit" type="submit" name="submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
