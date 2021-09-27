@extends('layout.main')

@section('title')
    Customer
@endsection

@section('style')
@endsection

@section('content')
    <div class="bar">
        <div class="attribut float-start">
            <a href="{{ route('attributes') }}" class="btn btn-danger"> Attributes</a>
        </div>
        <div id="title_bar" class="btn-toolbar float-end">
            <a href="{{ url('items/new_item') }}" class="btn btn-primary btn-sm" title="New Item">
                <i class="fas fa-tags"></i> New Item
            </a>
            <button class="btn btn-primary btn-sm ms-1" title="Import customers from Excel sheet">
                <i class="far fa-user"></i> Excel Import
            </button>
        </div>
    </div>


    {{-- @include("partial.successalert") --}}

    <div class="clearfix"></div>

    <div id="table_holder">
        <div class="bootstrap-table">
            <div class="fixed-table-toolbar mt-2">
                <div class="bs-bars pull-left">
                    <div id="toolbar">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="btn-toolbar">
                                    <button id="delete" class="btn btn-secondary btn-sm" disabled>
                                        <i class="far fa-trash-alt"></i> Delete
                                    </button>
                                    <button id="email" class="btn btn-secondary btn-sm ms-1" disabled>
                                        <i class="far fa-envelope"></i> Bulk Edit
                                    </button>
                                    {{-- <button id="email" class="btn btn-secondary btn-sm ms-1" disabled>
                                        <i class="fas fa-barcode"></i> Generate Barcodes
                                    </button> --}}

                                    <input type="text" placeholder="01/01/2010 - 08/15/2021">
                                    <button class="btn btn-default btn-sm dropdown-toggle border-1" title="Export data"
                                        data-bs-toggle="dropdown" type="button" aria-expanded="true">
                                        Nothing Selected </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Empty UPC Items</a></li>
                                        <li><a href="#">Out Of Stock Items</a></li>
                                        <li><a href="#">Serialized Items</a></li>
                                        <li><a href="#">No Description Items</a></li>
                                        <li><a href="#">Search Custom Fields</a></li>
                                        <li><a href="#">Deleted</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-flex float-end">
                                    <div class="btn-group ms-1">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-table"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="1" class="form-check-input column-visible"
                                                        type="checkbox" value="sku" id="sku" checked>
                                                    <label class="form-check-label" for="sku">
                                                        SKU
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="2" class="form-check-input column-visible"
                                                        type="checkbox" value="name" id="name" checked>
                                                    <label class="form-check-label" for="name">
                                                        Product Name
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="3" class="form-check-input column-visible"
                                                        type="checkbox" value="category_id" id="category_id" checked>
                                                    <label class="form-check-label" for="category_id">
                                                        Category
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="4" class="form-check-input column-visible"
                                                        type="checkbox" value="company_name" id="company_name" checked>
                                                    <label class="form-check-label" for="company_name">
                                                        Category
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="5" class="form-check-input column-visible"
                                                        type="checkbox" value="cost_price" id="cost_price" checked>
                                                    <label class="form-check-label" for="cost_price">
                                                        Cost Price
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="6" class="form-check-input column-visible"
                                                        type="checkbox" value="unit_price" id="unit_price" checked>
                                                    <label class="form-check-label" for="unit_price">
                                                        Unit Price
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="7" class="form-check-input column-visible"
                                                        type="checkbox" value="quantity" id="quantity" checked>
                                                    <label class="form-check-label" for="quantity">
                                                        Quantity
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="8" class="form-check-input column-visible"
                                                        type="checkbox" value="tax1" id="tax1" checked>
                                                    <label class="form-check-label" for="tax1">
                                                        Tax Percent
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- <div class="btn-group ms-1">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-file-import"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'json'});">Json</a></li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'csv'});">CSV</a></li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'pdf'});">PDF</a></li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'doc'});">Doc</a></li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'json'});">Json</a> </li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'sql'});">SQL</a></li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'txt'});">TXT</a></li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'xml'});">XML </a></li>
                                            <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'xlsx'});">Xlsx </a></li>
                                            <li> <a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'xls'});">MS Excel </a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-table-container pb-2 pt-2">
                <div class="fixed-table-body">
                    <table id="product-table" class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th></th>
                                <th>SKU</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Cost Price</th>
                                <th>Retail Price</th>
                                <th>Quantity</th>
                                <th>Tax Percent(s)</th>
                                <th>Attribute</th>
                                <th>Base Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td data-pid="{{ $product->id }}">
                                        <input type="checkbox" id="ids" name="item_id[]" value="{{ $product->id }}">
                                    </td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @foreach ($product->categories as $item)
                                            <li>{{ $item->name }}</li>
                                        @endforeach
                                    </td>

                                    <td>{{ $product->cost_price }}</td>
                                    <td>{{ $product->unit_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->tax1 }}</td>
                                    <td>

                                    </td>
                                    <td class="text-center">
                                        @if ($product->baseimage)
                                            <img src="{{ asset($product->baseimage) }}" alt="" class="img-thumbnail"
                                                width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li class="d-grid">
                                                <a href="{{ url('items/edit/' . $product->id) }}"
                                                    class="btn btn-success "><i class="fas fa-edit"></i></a>
                                            </li>
                                            <li>
                                                <form class="my-1"
                                                    action="{{ url('items/destroy/' . $product->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="d-grid">
                                                        <button type="submit" class=" btn btn-danger "><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            </li>
                                            <li class="d-grid">
                                                <a target="_blank" href="{{ url('product/' . $product->id) }}"
                                                    class="btn btn-info"><i class="fas fa-eye"></i></a>

                                            </li>
                                            <li class="d-grid mt-1">
                                                <a href="{{ url('generatebarcode/' . $product->id) }}"
                                                    class="btn btn-secondary"><i class="fas fa-barcode"></i></a>

                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('script')
    <script>
        // $(".selectpicker").selectpicker();
        let productTable = $("#product-table").DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'excel', 'pdf', 'selectAll',
                'selectNone'
            ],
            columnDefs: [{
                'orderable': false,
                'searchable': false,
                'className': 'text-center',
                'checkboxes': {
                    'selectRow': true,
                },
                'targets': 0,
                // 'render': function(data, type, full, meta) {
                //     let value = $('<div/>').text(data).html();
                //     return '<div class="form-check"><input class="form-check-input" type="checkbox" name="item_id[]" value="' +
                //         value + '"></div>';
                // }
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            },
            order: [
                [1, 'asc']
            ]
        });

        $(".column-visible").on("click", function(e) {
            e.preventDefault();

            let target = e.currentTarget;
            let column = productTable.column($(this).attr('data-column'));
            column.visible(!column.visible());
            $(target).attr("checked", !$(target).prop("checked"));
        });



        $('input[type="checkbox"]').on('click', function() {
            if ($(this).is(":checked")) {
                $("button#delete").attr("disabled", false);
                // $('button#delete').attr('disabled', false) //checked
            } else {
                $("button#delete").attr("disabled", true);
            }
        });


        $('button#delete').click(function() {

            var values = $("input[name='item_id[]']:checked")
                .map(function() {
                    return $(this).val();
                }).get();
            var arr = [];
            for (let index = 0; index < values.length; index++) {
                arr.push(values[index]);

            }
            // console.log(arr);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('multi.delete') }}",
                method: 'post',
                data: {
                    ids: arr
                },
                success: function(response) {
                    console.log(response)
                }
            });

            // console.log(values);
        });
    </script>
@endsection
