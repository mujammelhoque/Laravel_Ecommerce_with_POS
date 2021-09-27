<div class="form-group mb-3">
    <label for="coupon">Coupon Name</label>
    {!! Form::text('coupon', null, ['id' => 'coupon', 'class' => 'form-control']) !!}
    @error('coupon')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="value">Value</label>
    {!! Form::text('value', null, ['id' => 'value', 'class' => 'form-control']) !!}
    @error('value')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="price_limit">Price Limit</label>
    {!! Form::text('price_limit', null, ['id' => 'price_limit', 'class' => 'form-control']) !!}
    @error('price_limit')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="max_used">Use Limit</label>
    {!! Form::text('max_used', null, ['id' => 'max_used', 'class' => 'form-control']) !!}
    @error('max_used')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="coupon_validity">Use Limit</label>
    {!! Form::date('coupon_validity', null, ['id' => 'coupon_validity', 'class' => 'form-control']) !!}
    @error('coupon_validity')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
