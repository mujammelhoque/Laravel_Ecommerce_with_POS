<div class="col-sm-4">
    <label for="first_name" class="form-label">First Name</label>
    {!! Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="last_name" class="form-label">Last Name</label>
    {!! Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="gender" class="form-label">Gender</label>
    <div class="clearfix"></div>
    <div class="form-check form-check-inline">
        {!! Form::radio('gender', 'm', false, ['class' => 'form-check-input', 'id' => 'gender-m']) !!}
        <label class="form-check-label" for="gender-m">Male</label>
    </div>
    <div class="form-check form-check-inline">
        {!! Form::radio('gender', 'f', false, ['class' => 'form-check-input', 'id' => 'gender-f']) !!}
        <label class="form-check-label" for="gender-f">Female</label>
    </div>
    <div class="form-check form-check-inline">
        {!! Form::radio('gender', 'o', false, ['class' => 'form-check-input', 'id' => 'gender-o']) !!}
        <label class="form-check-label" for="gender-m">Other</label>
    </div>
</div>
<div class="col-sm-4">
    <label for="email" class="form-label">Email</label>
    <div class="input-group">
        <div class="input-group-text">
            <i class="fas fa-envelope"></i>
        </div>
        {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control form-control-sm']) !!}
    </div>
</div>
<div class="col-sm-4">
    <label for="email" class="form-label">Phone Number</label>
    <div class="input-group">
        <div class="input-group-text">
            <i class="fas fa-tty"></i>
        </div>
        {!! Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control form-control-sm']) !!}
    </div>
</div>
<div class="col-sm-4">
    <label for="address1" class="form-label">Address 1</label>
    {!! Form::text('address1', null, ['id' => 'address1', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="address2" class="form-label">Address 2</label>
    {!! Form::text('address2', null, ['id' => 'address2', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="city" class="form-label">City</label>
    {!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="state" class="form-label">State</label>
    {!! Form::text('state', null, ['id' => 'state', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="zip" class="form-label">Zip</label>
    {!! Form::text('zip', null, ['id' => 'zip', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="country" class="form-label">Country</label>
    {!! Form::text('country', null, ['id' => 'country', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="company" class="form-label">Company</label>
    {!! Form::text('company', null, ['id' => 'company', 'class' => 'form-control form-control-sm']) !!}
</div>
<div class="col-sm-4">
    <label for="account" class="form-label">Account #</label>
    {!! Form::text('account', null, ['id' => 'account', 'class' => 'form-control form-control-sm']) !!}
</div>

<div class="col-sm-4">
    <label for="total" class="form-label">Total</label>
    <div class="input-group input-group-sm">
        <div class="input-group-text">
            $
        </div>
        {!! Form::text('total', null, ['id' => 'total', 'class' => 'form-control form-control-sm']) !!}
    </div>
</div>

<div class="col-sm-4">
    <label for="discount" class="form-label">Discount</label>
    <div class="input-group input-group-sm">
        {!! Form::text('discount', null, ['id' => 'discount', 'class' => 'form-control form-control-sm']) !!}
        <div class="input-group-text">
            %
        </div>
    </div>
</div>
<div class="col-sm-4">
    <div class="form-check">
        {!! Form::checkbox('taxable', '1', @$customer->taxable == '1' ? true : false, ['class' => 'form-check-input']) !!}
        <label class="form-check-label" for="taxable">Taxable</label>
    </div>
</div>

<div class="col-sm-8">
    <label for="comments" class="form-label">Comments</label>
    {!! Form::textarea('comments', null, ['class' => 'form-control form-control-sm', 'rows' => 5]) !!}
</div>
