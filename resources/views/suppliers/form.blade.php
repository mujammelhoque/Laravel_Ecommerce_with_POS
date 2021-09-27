<div class="col-md-4 mb-2">
    {!! Form::label('company_name', 'Company Name', ['class' => 'form-label']); !!}
    {!! Form::text('company_name',null,['id'=>'company_name','class'=>'form-control']) !!}
    @error('company_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('agency_name', 'Agency Name', ['class' => 'form-label']); !!}
    {!! Form::text('agency_name',null,['id'=>'agency_name','class'=>'form-control']) !!}
    @error('agency_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('account_number', 'Account Number', ['class' => 'form-label']); !!}
    {!! Form::text('account_number',null,['id'=>'account_number','class'=>'form-control']) !!}
    @error('account_number')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('first_name', 'First Name', ['class' => 'form-label']); !!}
    {!! Form::text('first_name',null,['id'=>'first_name','class'=>'form-control']) !!}
    @error('first_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('last_name', 'Last Name', ['class' => 'form-label']); !!}
    {!! Form::text('last_name',null,['id'=>'last_name','class'=>'form-control']) !!}
    @error('last_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('gender', 'Gender', ['class' => 'form-label']); !!} <br>
    Male {!! Form::radio('gender', 'm', null); !!}
    Female {!! Form::radio('gender', 'f', null); !!}
    Other {!! Form::radio('gender', 'o', null); !!}
    @error('gender')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('phone', 'Phone', ['class' => 'form-label']); !!}
    {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control']) !!}
    @error('phone')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('email', 'Email', ['class' => 'form-label']); !!}
    {!! Form::text('email',null,['id'=>'email','class'=>'form-control']) !!}
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('address1', 'Address1', ['class' => 'form-label']); !!}
    {!! Form::text('address1',null,['id'=>'address1','class'=>'form-control']) !!}
    @error('address1')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('address2', 'Address2', ['class' => 'form-label']); !!}
    {!! Form::text('address2',null,['id'=>'address2','class'=>'form-control']) !!}
    @error('address2')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('city', 'City', ['class' => 'form-label']); !!}
    {!! Form::text('city',null,['id'=>'city','class'=>'form-control']) !!}
    @error('city')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('state', 'State', ['class' => 'form-label']); !!}
    {!! Form::text('state',null,['id'=>'state','class'=>'form-control']) !!}
    @error('state')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('zip', 'Zip', ['class' => 'form-label']); !!}
    {!! Form::text('zip',null,['id'=>'zip','class'=>'form-control']) !!}
    @error('zip')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-4 mb-2">
    {!! Form::label('country', 'Country', ['class' => 'form-label']); !!}
    {!! Form::text('country',null,['id'=>'country','class'=>'form-control']) !!}
    @error('country')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="col-md-12 mb-2">
    {!! Form::label('comments', 'Comments', ['class' => 'form-label']); !!}
    {!! Form::textarea('comments',null,['id'=>'comments','class'=>'form-control']) !!}
    @error('comments')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
