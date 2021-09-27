@extends('layout.main')
@section('title')
    Employees
@endsection
@section('style')
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="btn-toolbar d-md-flex justify-content-md-end">
               <a href="{{ url('employees/new') }}" class=" fa fa-user btn mybtn-info fw-light"> &nbsp; New Employee</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">

            <div class="col-3">
                <button id="dbtn" class="btn btn-secondary fas fa-trash-alt fw-light" disabled="'ture">&nbsp; Delete</button>
                <button id="ebtn" class="btn btn-secondary fas fa-envelope fw-light" disabled="'true">&nbsp; Email</button>
            </div>
            <div class="col-6">

            </div>
            <div class="col-3 d-flexd-md-flex justify-content-md-end">
                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-2 me-2">
                        <div class="bt1">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-th"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><input type="checkbox" name="" id=""> Id</li>
                                    <li><input type="checkbox" name="" id=""> Last Name</li>
                                    <li><input type="checkbox" name="" id=""> First Name</li>
                                    <li><input type="checkbox" name="" id=""> Email</li>
                                    <li><input type="checkbox" name="" id="" checked > Phone Number</li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="btn2">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-external-link-alt"></i>
                                </button>
                                <ul class="dropdown-menu em-dropdown" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="javascript:void (0)" onclick="$('table').tableExport({type:'json'});">Json</a></li>
                                    <li><a class="dropdown-item" href="#">XML</a></li>
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
                            </div>

                        </div>
                    </div>
                </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table id="employeetable" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                <thead>
                <tr >
                    <th scope="row"><input type="checkbox" name="" id="checkall"> Id </th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>

                </thead>
                <tbody>
                @forelse($employess as $employee)
                <tr>
                    <th scope="row"><input type="checkbox" name="" id="checkone"> {{$employee->id}}</th>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        {{-- <a href="{{ url('employees/sms/send') }}"><i class="fas fa-mobile-alt text-success"></i></a> &nbsp; --}}
                        <a href="{{ url('employees/'.$employee->id.'/edit') }}"><i class="fas fa-edit text-success"></i></a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-danger"> Employee Not Found</td>
                    </tr>
                @endforelse
               </tbody>
            </table>

        </div>
    </div>
@endsection
@section('script')
            <script>
$(document).ready(function (){
$('#checkall').on('change',function (){
    if ($(this).is(':checked')){
        $('button#dbtn').attr('disabled',false);
        $('button#ebtn').attr('disabled',false);
    }else {
        $('button#dbtn').attr('disabled',true);
        $('button#ebtn').attr('disabled',true);
    }

});
});
            </script>
@endsection


