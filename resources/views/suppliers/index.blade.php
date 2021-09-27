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
                <a href="{{ url('suppliers/create') }}" class=" fa fa-user btn btn-info"> &nbsp; New Suppliers</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">

        <div class="col-3">
            <button id="delete" class="btn btn-secondary fas fa-trash-alt" disabled>&nbsp; Delete</button>
            <button id="email" class="btn btn-secondary fas fa-envelope" disabled>&nbsp; Email</button>
        </div>
        <div class="col-6">

        </div>
        <div class="col-3 d-flexd-md-flex justify-content-md-end">
            <div class="row">
                <div class="col-8">
                    <div class="search">
                        <input type="text" name="" id="" placeholder="Search">
                    </div>
                </div>
                {{-- <div class="col-2">
                        <div class="bt1">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">

                                    <i class="fas fa-th"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><input type="checkbox" name="" id=""> Id</li>
                                    <li><input type="checkbox" name="" id="">Company Name</li>
                                    <li><input type="checkbox" name="" id=""> Agency Name</li>
                                   <li><input type="checkbox" name="" id=""> Last Name</li>
                                    <li><input type="checkbox" name="" id=""> First Name</li>
                                    <li><input type="checkbox" name="" id=""> Email</li>
                                    <li><input type="checkbox" name="" id="" checked disabled> Phone Number</li>
                                </ul>
                              </div>
                        </div>
                    </div> --}}
                <div class="col-2">
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle show"
                            data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="fas fa-external-link-alt"></i>
                        </button>
                        <ul class="dropdown-menu show" aria-labelledby="btnGroupDrop1" data-popper-placement="bottom-start"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 33px);">
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'json'});">Json</a></li>
                            <li><a class="dropdown-item" href="#">XML</a></li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'csv'});">CSV</a></li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'pdf'});">PDF</a></li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'doc'});">Doc</a></li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'json'});">Json</a> </li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'sql'});">SQL</a></li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'txt'});">TXT</a></li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'xml'});">XML </a></li>
                            <li><a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'xlsx'});">Xlsx </a></li>
                            <li> <a class="dropdown-item" href="javascript:void (0)"
                                    onclick="$('table').tableExport({type:'xls'});">MS Excel </a></li>
                        </ul>
                    </div>
                    <div class="btn2">

                        {{-- <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-external-link-alt"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('fail'))
                    <div class="alert alert-danger">{{ session('fail') }}</div>
                @endif
                <table id="supplier" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" name="" id=""></th>
                            <th scope="col">Id</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Agency Name</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($suppliers as $supplier)
                            <tr>
                                <th scope="row"><input type="checkbox" name="id[]" id="ids" value="{{ $supplier->id }}">
                                </th>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->company_name }}</td>
                                <td>{{ $supplier->agency_name }}</td>
                                <td>{{ $supplier->first_name }}</td>
                                <td>{{ $supplier->last_name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>
                                    <a href="{{ route('suppliers.edit', ['supplier' => $supplier->id]) }}"><i
                                            class="fas fa-edit text-success"></i></a>
                                    <a href="#"><i class="fas fa-mobile-alt text-success"></i></a>

                                </td>

                            </tr>
                        @empty
                            Not Found
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>





    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('#ids').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('button#delete').attr('disabled', false);
                        $('button#email').attr('disabled', false);
                    } else {
                        $('button#delete').attr('disabled', true);
                        $('button#email').attr('disabled', true);
                    }

                });
                $('button#delete').click(function() {
                    var d = $('input#ids').val();
                    console.log(typeof d)
                    // d= $('input#ids' ).serializeArray()
                    // $.each( d, function( key, value ) {
                    //     console.log(typeof value );
                    // });
                    console.log(d);
                });
            });
        </script>
    @endsection
