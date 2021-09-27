
@extends('layout.main')
@section('title')
    New Gift Cards
@endsection
@section('style')
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="card m-auto" style="width: 50%">
                <div class="card-header text-center bg-success text-white">
                    New Gift Cards
                </div>
                <div class="card-body">
                    <div class="my-2 fw-bold">
                        Card Number: {{$gift_card->card_number}}
                    </div>
                    {!! Form::open(['url' => 'giftcards/update','method'=>'POST','files'=>true]) !!}
                    <input type="hidden" id="id" name="id" value="{{$gift_card->id}}">
                    <div class="row">
                        <div class="col-md-3 p-1">
                            Customer
                        </div>
                        <div class="col-md-9">
                            <div class="form-group" is="select-customar">
                                {{--                            {!! Form::text('search_employee',null,['class'=>'form-control ui-autocomplete-input','id'=>'value','placeholder'=>'Start Customer Phone or Name','autocomplete'=>'off']) !!}--}}
                                <input type="text" id="search_employee" class="form-control ui-autocomplete-input" placeholder="Start Customer Phone or Name..." tabindex="5" autocomplete="off" value="{{$gift_card->customer->first_name}}">
                                <span class="text-danger" id="employee_error"></span>
                                <div>Customer: <span id="employee"></span></div>
                            </div>
                        </div>
                    </div>


                    <div class="email mt-2 my-3">
                        <div class="row">
                            <div class="col-md-3 p-1">
                                Value
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><b>৳</b></span>
                                    <input type="text" name="value" value="{{$gift_card->value}}" class="form-control" id="value">
{{--                                    {!! Form::text('value',"{{}}",['class'=>'form-control','id'=>'value']) !!}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="email mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1">
                                Expire Date
                            </div>
                            <div class="col-md-9">
                                <div class=" input-group">
                                    <input type="date" name="date" value="{{$gift_card->expire_date}}" class="form-control" id="date">
{{--                                    {!! Form::date('date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button mt-2">
                        <div class="row">
                            <div class="col-md-3 p-1 ">

                            </div>
                            <div class="col-md-9 text-end">
                                <input value="Update" type="submit" name="submit" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            // Search Employee
            $("#search_employee").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('customer.search') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#search_employee').val(ui.item.label)
                    $('span#employee').html('<span>' + ui.item.name +
                        '</span><input type="hidden" name="employee_id" id="employee_id" value="' +
                        ui.item.id + '">'); // save selected id to input
                    return false;
                }
            });
        });
    </script>
@endsection
