<fieldset class="mb-4 ">
    <div class="username mt-2">
        <div class="row">
            <div class="col-md-3 p-1">
                Email
            </div>
            <div class="col-md-9">
                <div class=" input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                </div>
                @error('email')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="email mt-2">
        <div class="row">
            <div class="col-md-3 p-1">
                Password
            </div>
            <div class="col-md-9">
                <div class=" input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                </div>
                @error('password')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="email mt-2">
        <div class="row">
            <div class="col-md-3 p-1">
                Retype Password
            </div>
            <div class="col-md-9">
                <div class=" input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) !!}
                </div>
                @error('password_confirmation')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</fieldset>
<hr>

<div class="fname mt-2">
    <div class="row">
        <div class="col-md-3 p-1 ">
            First Name
        </div>
        <div class="col-md-9">
            <div>
                {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) !!}
            </div>
            @error('first_name')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>
<div class="lname mt-2">
    <div class="row">
        <div class="col-md-3 p-1 ">
            Last Name
        </div>
        <div class="col-md-9">
            <div>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) !!}
            </div>
            @error('last_name')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
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
                <div class="col-md-4"> {!! Form::radio('gender', 'm') !!} Male</div>
                <div class="col-md-4">&nbsp;{!! Form::radio('gender', 'f') !!} Female</div>
                <div class="col-md-4">&nbsp;{!! Form::radio('gender', 'o') !!} Other</div>
            </div>
            @error('gender')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
{{-- <div class="email mt-2">
    <div class="row">
        <div class="col-md-3 p-1">
            Email
        </div>
        <div class="col-md-9">
            <div class=" input-group">
                <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
            </div>
            @error('email')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div> --}}
<div class="phone mt-2">
    <div class="row">
        <div class="col-md-3 p-1">
            Phone
        </div>
        <div class="col-md-9">
            <div class=" input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-tty"></i></span>
                {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
            </div>
            @error('phone')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="address1 mt-2">
    <div class="row">
        <div class="col-md-3 p-1">
            Image
        </div>
        <div class="col-md-9">
            @if (isset($employee_data->image))
                <div style="width: 100px">
                    <img class="img-fluid" src="{{ asset('uploads/employees/' . $employee_data->image) }}"
                        alt="">
                </div>
            @endif
            {!! Form::file('image', ['class' => 'form-control', 'id' => 'image']) !!}
            @error('image')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
</div>
<div class="address2 mt-2">
    <div class="row">
        <div class="col-md-3 p-1">
            Employee Id
        </div>
        <div class="col-md-9">
            {!! Form::text('employeeid', null, ['class' => 'form-control', 'id' => 'employeeid']) !!}
            @error('employeeid')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
{{-- <div class="City mt-2"> --}}
{{-- <div class="row"> --}}
{{-- <div class="col-md-3 p-1"> --}}
{{-- City --}}
{{-- </div> --}}
{{-- <div class="col-md-9"> --}}
{{-- {!! Form::text('password_confirm',null,['class'=>'form-control','id'=>'password_confirm']) !!} --}}
{{-- @error('password_confirm') --}}
{{-- <div id="emailHelp" class="form-text text-danger">{{$message}}</div> --}}
{{-- @enderror --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="state mt-2"> --}}
{{-- <div class="row"> --}}
{{-- <div class="col-md-3 p-1"> --}}
{{-- State --}}
{{-- </div> --}}
{{-- <div class="col-md-9"> --}}
{{-- {!! Form::text('password_confirm',null,['class'=>'form-control','id'=>'password_confirm']) !!} --}}
{{-- @error('password_confirm') --}}
{{-- <div id="emailHelp" class="form-text text-danger">{{$message}}</div> --}}
{{-- @enderror --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="zip mt-2"> --}}
{{-- <div class="row"> --}}
{{-- <div class="col-md-3 p-1"> --}}
{{-- Zip --}}
{{-- </div> --}}
{{-- <div class="col-md-9"> --}}
{{-- {!! Form::text('password_confirm',null,['class'=>'form-control','id'=>'password_confirm']) !!} --}}
{{-- @error('password_confirm') --}}
{{-- <div id="emailHelp" class="form-text text-danger">{{$message}}</div> --}}
{{-- @enderror --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="country mt-2"> --}}
{{-- <div class="row"> --}}
{{-- <div class="col-md-3 p-1"> --}}
{{-- Country --}}
{{-- </div> --}}
{{-- <div class="col-md-9"> --}}
{{-- {!! Form::text('password_confirm',null,['class'=>'form-control','id'=>'password_confirm']) !!} --}}
{{-- @error('password_confirm') --}}
{{-- <div id="emailHelp" class="form-text text-danger">{{$message}}</div> --}}
{{-- @enderror --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- <div class="comment mt-2"> --}}
{{-- <div class="row"> --}}
{{-- <div class="col-md-3 p-1 "> --}}
{{-- Comments --}}
{{-- </div> --}}
{{-- <div class="col-md-9"> --}}
{{-- <textarea name="comments" id="" cols="6" class="form-control"></textarea> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
