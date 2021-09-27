@extends('layout.main')

@section('title')
    Customer
@endsection

@section('style')
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @include('partial.formerror')
                <form action="{{ url('items/update/' . $product->id) }}" class="row g-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="col-sm-4">
                        <label for="sku" class="form-label">SKU</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-barcode"></i>
                            </div>
                            {!! Form::text('sku', $product->sku, ['id' => 'sku', 'class' => 'form-control form-control-sm']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="name" class="form-label">Product Name</label>
                        {!! Form::text('name', $product->name, ['id' => 'name', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="category" class="form-label">Category</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </div>
                            {!! Form::select('categories[]', $categories, $product->categories->pluck('id'), ['id' => 'category', 'multiple', 'class' => 'form-control form-control-sm multiselect']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        {!! Form::select('supplier_id', $suppliers, $product->supplier_id, ['id' => 'supplier_id', 'class' => 'form-control form-control-sm', 'placeholder' => 'Select Supplier']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="unit" class="form-label">Unit</label>
                        {!! Form::select('unit', $units, $product->unit, ['id' => 'unit', 'class' => 'form-control form-control-sm', 'placeholder' => 'Select Unit']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="cost_price" class="form-label">Cost Price</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-text">
                                BDT
                            </div>
                            {!! Form::text('cost_price', $product->cost_price, ['id' => 'cost_price', 'class' => 'form-control form-control-sm']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="unit_price" class="form-label">Retail Price</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-text">
                                BDT
                            </div>
                            {!! Form::text('unit_price', $product->unit_price, ['id' => 'unit_price', 'class' => 'form-control form-control-sm']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="tax" class="form-label">Tax</label>
                        {!! Form::text('tax1', $product->tax1, ['id' => 'tax', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="quantity" class="form-label">Quantity Stock</label>
                        {!! Form::text('quantity', $product->quantity, ['id' => 'quantity', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="reorder_level" class="form-label">Reorder Level</label>
                        {!! Form::text('reorder_level', $product->reorder_level, ['id' => 'reorder_level', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="loc" class="form-label">Location</label>
                        {!! Form::text('loc', $product->loc, ['id' => 'loc', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-12">
                        <fieldset>
                            <legend>Attributes</legend>
                            <div class="row">
                                @foreach($attributes as $attribute)
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-text">
                                                {{ $attribute->name }}
                                            </div>
                                            @php
                                                $attributeOptions = $attribute->values()->pluck('value', 'value');
                                                $selectedOption = null;
                                                $name = $attribute->name;

                                                if ($product->attributes) {
                                                    $selectedOption = json_decode($product->attributes);
                                                    $selectedOption = isset($selectedOption->$name) ? $selectedOption->$name : null;
                                                }
                                            @endphp
                                            {!! Form::select("attributes[$name][]", $attributeOptions, $selectedOption, ['id' => 'attributes_'.$attribute->id, 'multiple', 'class' => 'form-control form-control-sm multiselect']) !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-sm-8">
                        <label for="description" class="form-label">Description</label>
                        {!! Form::textarea('description', $product->description, ['class' => 'form-control form-control-sm', 'rows' => 5]) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="description" class="form-label">Base Image</label>
                        <div class="main-img-preview mb-1 img-thumbnail" style="width: 150px;height: 150px;">
                            <img id="base-image-preview" class="img-thumbnail baseimage-preview"
                                src="{{ asset($product->baseimage) }}" title="Base Image">
                        </div>
                        {!! Form::file('baseimage', ['class' => 'form-control form-control-sm', 'id' => 'baseimage']) !!}
                    </div>
                    <div class="col-sm-4">
                        <label for="description" class="form-label">Multiple Image</label>
                        <div class="multiple-img-preview mb-1 img-thumbnail">
                            @foreach ($product->images as $multipleImage)
                                <img class="img-thumbnail baseimage-preview" src="{{ asset($multipleImage->note) }}"
                                    title="{{ $multipleImage->name }}" style="height: 150px;width: 150px;">
                            @endforeach
                        </div>
                        {!! Form::file('multiple_image[]', ['multiple', 'id' => 'multiple_image', 'class' => 'form-control']) !!}
                        {{-- @error('image') --}}
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check form-check-inline">
                            {!! Form::checkbox('alt_description', 1, $product->alt_description, ['id' => 'alt_description', 'class' => 'form-check-input']) !!}
                            <label class="form-check-label" for="alt_description">Allow Alt Description</label>
                        </div>
                        <div class="form-check form-check-inline">
                            {!! Form::checkbox('has_serial', 1, $product->has_serial, ['id' => 'has_serial', 'class' => 'form-check-input']) !!}
                            <label class="form-check-label" for="has_serial">Item has Serial Number</label>
                        </div>
                    </div>

                    <div class="col-sm-4 serialno" id="">
                        <label for="serialno" class="form-label">Serial Number</label>
                        {!! Form::text('serialno', $product->serialno, ['id' => 'serialno', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-sm-12 text-end">
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
@endsection

@section('script')
    <script>
        $(".serialno").hide();

        $("#has_serial").on("change", function() {
            if ($(this).is(":checked")) {
                $(".serialno").show();
            } else {
                $(".serialno").hide();
            }
        });

        $('.multiselect').selectpicker();

        $("#baseimage").change(function() {
            if (this.files && this.files[0]) {
                let file = this.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    let src = e.target.result;
                    $("#base-image-preview").attr('src', src);
                };

                reader.readAsDataURL(file);
            }
        });

        $("#multiple_image").change(function(e) {
            if (this.files) {
                let files = this.files;
                $(".multiple-img-preview").empty();

                $.each(files, function(i, file) {
                    // console.log(file);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var src = e.target.result;
                        $(".multiple-img-preview").append(
                            '<img width="150" height="150" class="img-thumbnail images-preview" src="' +
                            src + '">'
                        );
                    };

                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
@endsection
