@extends('layout.main')
@section('title')
   Messages
@endsection
@section('style')
@endsection


@section('content')
    <div class="card-header" style="max-width: 60%; margin:auto">
        <form action="#" id="send_sms_form" enctype="multipart/form-data" method="post" class="form-horizontal" accept-charset="utf-8" novalidate="novalidate">
            @csrf
            <fieldset>
                <legend style="text-align: center;">Send SMS</legend>
                <div class="form-group form-group-sm">
                    <label for="phone" class="col-xs-3 control-label">Phone number</label>
                    <div class="col-xs-9">
                        <input class="form-control input-sm" ,="" type="text" name="phone" placeholder="Mobile Number(s) here...">
                        <span class="help-block" style="text-align:center;">(In case of multiple recipients, enter mobile numbers separated by commas)</span>
                    </div>
                </div>

                <div class="form-group form-group-sm mb-2">
                    <label for="message" class="col-xs-3 control-label">Message</label>
                    <div class="col-xs-9">
                        <textarea class="form-control input-sm" rows="3" id="message" name="message" placeholder="Your Message here..."></textarea>
                    </div>
                </div>

                <input type="submit" name="submit_form" value="Submit" id="submit_form" class="btn btn-secondary btn-sm float-end">
            </fieldset>
        </form></div>
@endsection
@section('script')
@endsection


