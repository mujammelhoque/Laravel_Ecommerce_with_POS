@extends('layout.main')

@section('title')
    Customer
@endsection

@section('style')
@endsection

@section('content')
    <div id="title_bar" class="btn-toolbar float-end">
        <a href="{{ url('customer/create') }}" class="btn btn-primary btn-sm" title="New Customer">
            <i class="fas fa-file-import"></i> New Customer
        </a>
        <button class="btn btn-primary btn-sm ms-1" title="Import customers from Excel sheet">
            <i class="far fa-user"></i> Excel Import
        </button>
    </div>
@include("partial.successalert")

    <div class="clearfix"></div>

    <div id="table_holder">
        <div class="bootstrap-table">
            <div class="fixed-table-toolbar mt-2">
                <div class="bs-bars pull-left">
                    <div id="toolbar">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-toolbar">
                                    <button id="delete" class="btn btn-secondary btn-sm" disabled>
                                        <i class="far fa-trash-alt"></i> Delete
                                    </button>
                                    <button id="email" class="btn btn-secondary btn-sm ms-1" disabled>
                                        <i class="far fa-envelope"></i> Email
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex float-end">
                                    <div class="btn-group ms-1">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-table"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="1" class="form-check-input column-visible" type="checkbox" value="last_name" id="last_name" checked>
                                                    <label class="form-check-label" for="last_name">
                                                        Last Name
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="2" class="form-check-input column-visible" type="checkbox" value="first_name" id="first_name" checked>
                                                    <label class="form-check-label" for="first_name">
                                                        First Name
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="3" class="form-check-input column-visible" type="checkbox" value="email" id="email" checked>
                                                    <label class="form-check-label" for="email">
                                                        Email
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="dropdown-item">
                                                <div class="form-check">
                                                    <input data-column="4" class="form-check-input column-visible" type="checkbox" value="phone" id="phone" checked>
                                                    <label class="form-check-label" for="phone">
                                                        Phone
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    {{--<div class="btn-group ms-1">
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
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-table-container pb-2 pt-2">
                <div class="fixed-table-body">
                    <table id="customer-table" class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>
                                    <input name="btSelectAll" id="btSelectAll" type="checkbox">
                                </th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allcustomer as $customer)
                                <tr>
                                    <td class="bs-checkbox print_hide">
                                        <input data-index="0" name="btSelectItem" type="checkbox">
                                    </td>
                                    <td class="" style="">{{$customer->last_name}}</td>
                                    <td class="" style="">{{$customer->first_name}}</td>
                                    <td class="" style="">
                                        <a href="mailto:{{$customer->email}}">{{$customer->email}}</a>
                                    </td>
                                    <td class="" style="">{{$customer->phone}}</td>
                                    <td class="print_hide text-center" style="">
                                        <a href="javascript:void(0)" title="Send SMS">
                                            <i class="fas fa-mobile"></i>
                                        </a>
                                    </td>
                                    <td class="print_hide text-center" style="">
                                        <ul class="list-unstyled list-inline">
                                            <li class="list-inline-item">
                                                <a href="{{Route("customer.edit",['customer'=>$customer->id])}}" title="Edit Customer">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('script')
    @php

    @endphp
    <script>
       $(document).ready(function (){
           // $('.dataTables_length').html('<div class="btn-toolbar"><button id="delete" class="btn btn-secondary btn-sm" disabled=""><i class="far fa-trash-alt"></i> Delete</button><button id="email" class="btn btn-secondary btn-sm ms-1" disabled=""><i class="far fa-envelope"></i> Email</button></div>');
           //
           //  $('#customer-table_filter').append('<div class="btn-group ms-1"><button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-table"></i></button><ul class="dropdown-menu checkbox-menu"><li><label><input type="checkbox" data-field="people.person_id" value="1" checked="checked">Id</label></li><li><label><input type="checkbox" data-field="last_name" value="2" checked="checked">Last Name</label></li><li><label><input type="checkbox" data-field="first_name" value="3" checked="checked">FirstName</label></li><li><label><input type="checkbox" data-field="email" value="4" checked="checked">Email</label></li><li><label><input type="checkbox" data-field="phone_number" value="5" checked="checked">PhoneNumber</label></li></ul></div>');
           $('#btSelectAll').on('change',function (){
               if ($(this).is(':checked')){
                   $('button#delete').attr('disabled',false);
                   $('button#email').attr('disabled',false);
               }else {
                   $('button#delete').attr('disabled',true);
                   $('button#email').attr('disabled',true);
               }

           });

           let productTable = $("#customer-table").DataTable({
               dom: 'Bfrtip',
               buttons: ['copy', 'excel', 'pdf', 'selectAll',
                   'selectNone'],
               columnDefs: [{
                   'orderable': false,
                   'searchable':false,
                   'className': 'text-center',
                   'checkboxes': {
                       'selectRow': true,
                   },
                   'targets': 0,
                   'render': function (data, type, full, meta){
                       let value = $('<div/>').text(data).html();
                       return '<div class="form-check"><input class="form-check-input" type="checkbox" name="item_id[]" value="' + value + '"></div>';
                   }
               }],
               select: {
                   style: 'multi',
                   selector: 'td:first-child'
               },
               order: [
                   [1, 'asc']
               ]
           });

           $(".column-visible").on("click", function (e) {
               e.preventDefault();

               let target = e.currentTarget;
               let column = productTable.column( $(this).attr('data-column') );
               column.visible( ! column.visible() );
               $(target).attr("checked", !$(target).prop("checked"));
           });
       });
    </script>
@endsection
