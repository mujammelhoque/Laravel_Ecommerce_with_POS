@extends('layout.main')
@section('title')
    Round-45
@endsection
@section('style')
@endsection


@section('content')
    <div id="logo" align="center"><img src="<?php echo base_url();?>/images/logo.png"></div>

    <div id="login">
        <form action="">
        <div id="container">
            <div align="center" style="color:red"></div>

            <div id="login_form">
                <div class="input-group">
                    <span class="input-group-addon input-sm"><i class="fas fa-user"></i></span>
                    <input  class="form-control" placeholder="" name="username" type="username" size=20 autofocus></input>
                </div>
                <div class="input-group">
                    <span class="input-group-addon input-sm"><i class="fas fa-lock"></i></span></span>
                    <input class="form-control" placeholder="" name="password" type="password" size=20></input>
                </div>

                <input class="btn btn-primary btn-block" type="submit" name="loginButton" value="Go"/>
            </div>
        </div>
        </form>

        <h1>Round 45 Point of sale</h1>
    </div>

@endsection
@section('script')
@endsection
