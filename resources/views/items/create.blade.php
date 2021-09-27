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
                {{-- @include('partial.formerror') --}}
                <form action="{{ url('items/store') }}" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-sm-4">
                        <label for="sku" class="form-label">SKU</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-barcode"></i>
                            </div>
                            {!! Form::text('sku', null, ['id' => 'sku', 'class' => 'form-control form-control-sm']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="name" class="form-label">Product Name</label>
                        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="category" class="form-label">Category</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </div>
                            {!! Form::select('categories[]', $categories, null, ['id' => 'category', 'multiple', 'class' => 'form-control form-control-sm multiselect']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        {!! Form::select('supplier_id', $suppliers, null, ['id' => 'supplier_id', 'class' => 'form-control form-control-sm', 'placeholder' => 'Select Supplier']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="unit" class="form-label">Unit</label>
                        {!! Form::select('unit', $units, null, ['id' => 'unit', 'class' => 'form-control form-control-sm', 'placeholder' => 'Select Unit']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="cost_price" class="form-label">Cost Price</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-text">
                                BDT
                            </div>
                            {!! Form::text('cost_price', null, ['id' => 'cost_price', 'class' => 'form-control form-control-sm']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="unit_price" class="form-label">Retail Price</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-text">
                                BDT
                            </div>
                            {!! Form::text('unit_price', null, ['id' => 'unit_price', 'class' => 'form-control form-control-sm']) !!}
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="tax" class="form-label">Tax</label>
                        {!! Form::text('tax1', null, ['id' => 'tax', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="quantity" class="form-label">Quantity Stock</label>
                        {!! Form::text('quantity', null, ['id' => 'quantity', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="reorder_level" class="form-label">Reorder Level</label>
                        {!! Form::text('reorder_level', null, ['id' => 'reorder_level', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="loc" class="form-label">Location</label>
                        {!! Form::text('loc', null, ['id' => 'loc', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="col-sm-12">
                        {{-- <select name="attr" id="attr">
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select> --}}
                        <fieldset>
                            <legend>Attributes</legend>

                            <div class="row">
                                @foreach ($attributes as $attribute)
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-text">
                                                {{ $attribute->name }}
                                            </div>
                                            @php
                                                $attributeOptions = $attribute->values()->pluck('value', 'value');
                                            @endphp
                                            {!! Form::select("attributes[$attribute->name][]", $attributeOptions, null, ['id' => 'attributes_' . $attribute->id, 'multiple', 'class' => 'form-control form-control-sm multiselect']) !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-sm-4">
                        <label for="description" class="form-label">Description</label>
                        {!! Form::textarea('description', null, ['class' => 'form-control form-control-sm', 'rows' => 5]) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="description" class="form-label">Base Image</label>
                        <div class="main-img-preview mb-1 img-thumbnail" style="width: 150px;height: 150px;">
                            <img id="base-image-preview" class="img-thumbnail baseimage-preview"
                                src="{{ asset('assets/images/sample.png') }}" title="Base Image">
                        </div>
                        {!! Form::file('baseimage', ['class' => 'form-control form-control-sm', 'id' => 'baseimage']) !!}
                    </div>
                    <div class="col-sm-4">
                        <label for="description" class="form-label">Multiple Image</label>
                        <div class="multiple-img-preview mb-1 img-thumbnail">
                            <img class="img-thumbnail baseimage-preview" src="{{ asset('assets/images/sample.png') }}"
                                title="Base Image" style="height: 150px;width: 150px;">
                        </div>
                        {!! Form::file('multiple_image[]', ['multiple', 'id' => 'multiple_image', 'class' => 'form-control']) !!}
                        {{-- @error('image') --}}
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check form-check-inline">
                            {!! Form::checkbox('alt_description', 1, null, ['id' => 'alt_description', 'class' => 'form-check-input']) !!}
                            <label class="form-check-label" for="alt_description">Allow Alt Description</label>
                        </div>
                        <div class="form-check form-check-inline">
                            {!! Form::checkbox('has_serial', 1, null, ['id' => 'has_serial', 'class' => 'form-check-input']) !!}
                            <label class="form-check-label" for="has_serial">Item has Serial Number</label>
                        </div>
                    </div>

                    <div class="col-sm-4 serialno" id="">
                        <label for="serialno" class="form-label">Serial Number</label>
                        {!! Form::text('serialno', null, ['id' => 'serialno', 'class' => 'form-control form-control-sm']) !!}
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-sm-12 text-end">
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".serialno").hide();

            $("#has_serial").on("change", function() {
                if ($(this).is(":checked")) {
                    $(".serialno").show();
                } else {
                    $(".serialno").hide();
                }
            });

            // $('.attributes').selectpicker();
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


        });
    </script>
    <script>
        $('select#attr').on('change', function() {
            var value = $(this).val();
            alert(value);
        });
    </script>
@endsection
